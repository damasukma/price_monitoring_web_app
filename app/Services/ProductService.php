<?php
namespace App\Services;

use App\Models\Product;
use App\Models\HistoryPrice;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function handle($data)
    {
        $out = file_get_contents($data['urlProduct']);
        $start = '<script id="__NEXT_DATA__" type="application/json">';
        $end = '</script>';
        $startsAt = strpos($out, $start) + strlen($start);
        $endsAt = strpos($out, $end, $startsAt);
    
        $record = substr($out, $startsAt, $endsAt - $startsAt);

        $newParse = json_decode($record);
        $result =  $newParse->props->pageProps->product ?? false;
        if(!isset($result->objectID))
        {
            return [false, null];
        }
        $productId = (int) $result->objectID;
            
        DB::beginTransaction();
          
        try
        {

            
            if(isset($result->type_id))
            {
                DB::rollback();
                return [false, null];
            }
    
            $images = array_map(function($val){
                return $val->url;
            }, $result->galleryImages);
            
         
            
            Product::updateOrCreate(
                [
                    'id' => $productId
                ],
                [
                    'id' => $productId,
                    'product_name' => $result->rawData->name,
                    'url' => $data['urlProduct'],
                    'images' => json_encode($images),
                    'product_description' => $result->rawData->description,
                    'price' => (int) $result->price->finalPrice->amount,
                ]
            );

            HistoryPrice::create([
                'product_id' => $productId,
                'price' => (int) $result->price->finalPrice->amount
            ]);


            DB::commit();
        }
        catch(Exception $e)
        {
            DB::rollback();
            return [false, null];
        }

        return [true, $productId];
    }


    public function first($id)
    {
        $product = Product::where('id', $id)->first();
        return $product;   
    }

    public function get()
    {
        $product = Product::get(['id', 'product_name', 'url']);
        
        return $product;
    }
}
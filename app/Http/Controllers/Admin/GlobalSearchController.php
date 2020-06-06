<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GlobalSearchController extends Controller
{
    private $models = [
        'Product'         => 'cruds.product.title',
        'UserAlert'       => 'cruds.userAlert.title',
        'Location'        => 'cruds.location.title',
        'Image'           => 'cruds.image.title',
        'Order'           => 'cruds.order.title',
        'OrderDetail'     => 'cruds.orderDetail.title',
        'Option'          => 'cruds.option.title',
        'OptionGroup'     => 'cruds.optionGroup.title',
        'CustomerSupport' => 'cruds.customerSupport.title',
        'SlideType'       => 'cruds.slideType.title',
        'Slide'           => 'cruds.slide.title',
        'TopMenu'         => 'cruds.topMenu.title',
        'FooterMenu'      => 'cruds.footerMenu.title',
    ];

    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search === null || !isset($search['term'])) {
            abort(400);
        }

        $term           = $search['term'];
        $searchableData = [];

        foreach ($this->models as $model => $translation) {
            $modelClass = 'App\\' . $model;
            $query      = $modelClass::query();

            $fields = $modelClass::$searchable;

            foreach ($fields as $field) {
                $query->orWhere($field, 'LIKE', '%' . $term . '%');
            }

            $results = $query->take(10)
                ->get();

            foreach ($results as $result) {
                $parsedData           = $result->only($fields);
                $parsedData['model']  = trans($translation);
                $parsedData['fields'] = $fields;
                $formattedFields      = [];

                foreach ($fields as $field) {
                    $formattedFields[$field] = Str::title(str_replace('_', ' ', $field));
                }

                $parsedData['fields_formated'] = $formattedFields;

                $parsedData['url'] = url('/admin/' . Str::plural(Str::snake($model, '-')) . '/' . $result->id . '/edit');

                $searchableData[] = $parsedData;
            }
        }

        return response()->json(['results' => $searchableData]);
    }
}

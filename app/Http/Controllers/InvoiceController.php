<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Language;
use App\Models\Order;
use Session;
use PDF;
use Config;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //download invoice
    public function invoice_download($id)
    {
        if (Session::has('currency_code')) {
            $currency_code = Session::get('currency_code');
        } else {
            $currency_code = Currency::findOrFail(get_setting('system_default_currency'))->code;
        }
        $language_code = Session::get('locale', Config::get('app.locale'));

        if (Language::where('code', $language_code)->first()->rtl == 1) {
            $direction = 'rtl';
            $text_align = 'right';
            $not_text_align = 'left';
        } else {
            $direction = 'ltr';
            $text_align = 'left';
            $not_text_align = 'right';
        }

        if (
            $currency_code == 'BDT' ||
            $language_code == 'bd'
        ) {
            // bengali font
            $font_family = "'Hind Siliguri','freeserif'";
        } elseif (
            $currency_code == 'KHR' ||
            $language_code == 'kh'
        ) {
            // khmer font
            $font_family = "'Hanuman','sans-serif'";
        } elseif ($currency_code == 'AMD') {
            // Armenia font
            $font_family = "'arnamu','sans-serif'";
            // }elseif($currency_code == 'ILS'){
            //     // Israeli font
            //     $font_family = "'Varela Round','sans-serif'";
        } elseif (
            $currency_code == 'AED' ||
            $currency_code == 'EGP' ||
            $language_code == 'sa' ||
            $currency_code == 'IQD' ||
            $language_code == 'ir' ||
            $language_code == 'om' ||
            $currency_code == 'ROM' ||
            $currency_code == 'SDG' ||
            $currency_code == 'ILS' ||
            $language_code == 'jo'
        ) {
            // middle east/arabic/Israeli font
            $font_family = "xbriyaz";
        } elseif ($currency_code == 'THB') {
            // thai font
            $font_family = "'Kanit','sans-serif'";
        } elseif (
            $currency_code == 'CNY' ||
            $language_code == 'zh'
        ) {
            // Chinese font
            $font_family = "'sun-exta','gb'";
        } elseif (
            $currency_code == 'MMK' ||
            $language_code == 'mm'
        ) {
            // Myanmar font
            $font_family = 'tharlon';
        } elseif (
            $currency_code == 'THB' ||
            $language_code == 'th'
        ) {
            // Thai font
            $font_family = "'zawgyi-one','sans-serif'";
        } elseif (
            $currency_code == 'USD'
        ) {
            // Thai font
            $font_family = "'Roboto','sans-serif'";
        } else {
            // general for all
            $font_family = "freeserif";
        }

        // $config = ['instanceConfigurator' => function($mpdf) {
        //     $mpdf->showImageErrors = true;
        // }];
        // mpdf config will be used in 4th params of loadview

        $config = [];

        $order = Order::findOrFail($id);
        if (in_array(auth()->user()->user_type, ['admin','staff']) || in_array(auth()->id(), [$order->user_id, $order->seller_id])) {
            return PDF::loadView('backend.invoices.invoice', [
                'order' => $order,
                'font_family' => $font_family,
                'direction' => $direction,
                'text_align' => $text_align,
                'not_text_align' => $not_text_align
            ], [], $config)->download('order-' . $order->code . '.pdf');
        }
        flash(translate("You do not have the right permission to access this invoice."))->error();
        return redirect()->route('home');
    }



    
    //download select invoice
    public function select_invoice_download(Request $request)
    {

       if(!isset($request->selected_items)){
           return back();
       }
        $products = Order::whereIn('id', $request->selected_items)->get();

        if (Session::has('currency_code')) {
            $currency_code = Session::get('currency_code');
        } else {
            $currency_code = Currency::findOrFail(get_setting('system_default_currency'))->code;
        }
        $language_code = Session::get('locale', Config::get('app.locale'));

        if (Language::where('code', $language_code)->first()->rtl == 1) {
            $direction = 'rtl';
            $text_align = 'right';
            $not_text_align = 'left';
        } else {
            $direction = 'ltr';
            $text_align = 'left';
            $not_text_align = 'right';
        }

        if (
            $currency_code == 'BDT' ||
            $language_code == 'bd'
        ) {
            // bengali font
            $font_family = "'Hind Siliguri','freeserif'";
        } elseif (
            $currency_code == 'KHR' ||
            $language_code == 'kh'
        ) {
            // khmer font
            $font_family = "'Hanuman','sans-serif'";
        } elseif ($currency_code == 'AMD') {
            // Armenia font
            $font_family = "'arnamu','sans-serif'";
            // }elseif($currency_code == 'ILS'){
            //     // Israeli font
            //     $font_family = "'Varela Round','sans-serif'";
        } elseif (
            $currency_code == 'AED' ||
            $currency_code == 'EGP' ||
            $language_code == 'sa' ||
            $currency_code == 'IQD' ||
            $language_code == 'ir' ||
            $language_code == 'om' ||
            $currency_code == 'ROM' ||
            $currency_code == 'SDG' ||
            $currency_code == 'ILS' ||
            $language_code == 'jo'
        ) {
            // middle east/arabic/Israeli font
            $font_family = "xbriyaz";
        } elseif ($currency_code == 'THB') {
            // thai font
            $font_family = "'Kanit','sans-serif'";
        } elseif (
            $currency_code == 'CNY' ||
            $language_code == 'zh'
        ) {
            // Chinese font
            $font_family = "'sun-exta','gb'";
        } elseif (
            $currency_code == 'MMK' ||
            $language_code == 'mm'
        ) {
            // Myanmar font
            $font_family = 'tharlon';
        } elseif (
            $currency_code == 'THB' ||
            $language_code == 'th'
        ) {
            // Thai font
            $font_family = "'zawgyi-one','sans-serif'";
        } elseif (
            $currency_code == 'USD'
        ) {
            // Thai font
            $font_family = "'Roboto','sans-serif'";
        } else {
            // general for all
            $font_family = "freeserif";
        }

        // $config = ['instanceConfigurator' => function($mpdf) {
        //     $mpdf->showImageErrors = true;
        // }];
        // mpdf config will be used in 4th params of loadview

        $config = [];
    //  foreach ($request->selected_items as $key => $value) {
          
        //$order = Order::findOrFail($value);
        return view('backend.invoices.pikuplist', [
            'order' => $products,
            'font_family' => $font_family,
            'direction' => $direction,
            'text_align' => $text_align,
            'not_text_align' => $not_text_align
        ], [], $config);
}   







//print label
    public function print_label(Request $request)
    {

       if(!isset($request->selected_items)){
           return back();
       }
        $products = Order::whereIn('id', $request->selected_items)->get();

        if (Session::has('currency_code')) {
            $currency_code = Session::get('currency_code');
        } else {
            $currency_code = Currency::findOrFail(get_setting('system_default_currency'))->code;
        }
        $language_code = Session::get('locale', Config::get('app.locale'));

        if (Language::where('code', $language_code)->first()->rtl == 1) {
            $direction = 'rtl';
            $text_align = 'right';
            $not_text_align = 'left';
        } else {
            $direction = 'ltr';
            $text_align = 'left';
            $not_text_align = 'right';
        }

        if (
            $currency_code == 'BDT' ||
            $language_code == 'bd'
        ) {
            // bengali font
            $font_family = "'Hind Siliguri','freeserif'";
        } elseif (
            $currency_code == 'KHR' ||
            $language_code == 'kh'
        ) {
            // khmer font
            $font_family = "'Hanuman','sans-serif'";
        } elseif ($currency_code == 'AMD') {
            // Armenia font
            $font_family = "'arnamu','sans-serif'";
            // }elseif($currency_code == 'ILS'){
            //     // Israeli font
            //     $font_family = "'Varela Round','sans-serif'";
        } elseif (
            $currency_code == 'AED' ||
            $currency_code == 'EGP' ||
            $language_code == 'sa' ||
            $currency_code == 'IQD' ||
            $language_code == 'ir' ||
            $language_code == 'om' ||
            $currency_code == 'ROM' ||
            $currency_code == 'SDG' ||
            $currency_code == 'ILS' ||
            $language_code == 'jo'
        ) {
            // middle east/arabic/Israeli font
            $font_family = "xbriyaz";
        } elseif ($currency_code == 'THB') {
            // thai font
            $font_family = "'Kanit','sans-serif'";
        } elseif (
            $currency_code == 'CNY' ||
            $language_code == 'zh'
        ) {
            // Chinese font
            $font_family = "'sun-exta','gb'";
        } elseif (
            $currency_code == 'MMK' ||
            $language_code == 'mm'
        ) {
            // Myanmar font
            $font_family = 'tharlon';
        } elseif (
            $currency_code == 'THB' ||
            $language_code == 'th'
        ) {
            // Thai font
            $font_family = "'zawgyi-one','sans-serif'";
        } elseif (
            $currency_code == 'USD'
        ) {
            // Thai font
            $font_family = "'Roboto','sans-serif'";
        } else {
            // general for all
            $font_family = "freeserif";
        }

        // $config = ['instanceConfigurator' => function($mpdf) {
        //     $mpdf->showImageErrors = true;
        // }];
        // mpdf config will be used in 4th params of loadview

        $config = [];
    //  foreach ($request->selected_items as $key => $value) {
          
        //$order = Order::findOrFail($value);
        return view('backend.invoices.label_print', [
            'order' => $products,
            'font_family' => $font_family,
            'direction' => $direction,
            'text_align' => $text_align,
            'not_text_align' => $not_text_align
        ], [], $config);
}  


//bulk invoice
public function bulk_invoice_download(Request $request){
    if (Session::has('currency_code')) {
        $currency_code = Session::get('currency_code');
    } else {
        $currency_code = Currency::findOrFail(get_setting('system_default_currency'))->code;
    }
    $language_code = Session::get('locale', Config::get('app.locale'));

    if (Language::where('code', $language_code)->first()->rtl == 1) {
        $direction = 'rtl';
        $text_align = 'right';
        $not_text_align = 'left';
    } else {
        $direction = 'ltr';
        $text_align = 'left';
        $not_text_align = 'right';
    }

    if (
        $currency_code == 'BDT' ||
        $language_code == 'bd'
    ) {
        // bengali font
        $font_family = "'Hind Siliguri','freeserif'";
    } elseif (
        $currency_code == 'KHR' ||
        $language_code == 'kh'
    ) {
        // khmer font
        $font_family = "'Hanuman','sans-serif'";
    } elseif ($currency_code == 'AMD') {
        // Armenia font
        $font_family = "'arnamu','sans-serif'";
        // }elseif($currency_code == 'ILS'){
        //     // Israeli font
        //     $font_family = "'Varela Round','sans-serif'";
    } elseif (
        $currency_code == 'AED' ||
        $currency_code == 'EGP' ||
        $language_code == 'sa' ||
        $currency_code == 'IQD' ||
        $language_code == 'ir' ||
        $language_code == 'om' ||
        $currency_code == 'ROM' ||
        $currency_code == 'SDG' ||
        $currency_code == 'ILS' ||
        $language_code == 'jo'
    ) {
        // middle east/arabic/Israeli font
        $font_family = "xbriyaz";
    } elseif ($currency_code == 'THB') {
        // thai font
        $font_family = "'Kanit','sans-serif'";
    } elseif (
        $currency_code == 'CNY' ||
        $language_code == 'zh'
    ) {
        // Chinese font
        $font_family = "'sun-exta','gb'";
    } elseif (
        $currency_code == 'MMK' ||
        $language_code == 'mm'
    ) {
        // Myanmar font
        $font_family = 'tharlon';
    } elseif (
        $currency_code == 'THB' ||
        $language_code == 'th'
    ) {
        // Thai font
        $font_family = "'zawgyi-one','sans-serif'";
    } elseif (
        $currency_code == 'USD'
    ) {
        // Thai font
        $font_family = "'Roboto','sans-serif'";
    } else {
        // general for all
        $font_family = "freeserif";
    }

     $config = ['instanceConfigurator' => function($mpdf) {
         $mpdf->showImageErrors = true;
     }];
    // mpdf config will be used in 4th params of loadview


    //dd($request->selected_items);
    $config = [];
    if($request->selected_items != null){
            
        $orders = Order::whereIn('id', $request->selected_items)->get();
        // Load invoice view and add it to the PDF
        $view = view('backend.invoices.multipleInvoice', [
            'orders' => $orders,
            'font_family' => $font_family,
            'direction' => $direction,
            'text_align' => $text_align,
            'not_text_align' => $not_text_align
        ]);
        $html = $view->render();
        $pdf = PDF::loadHTML($html);
        return $pdf->stream('invoices.pdf');
    }else{
        flash(translate('The selected items field is required.'))->error();
        return back();
    }
}
}

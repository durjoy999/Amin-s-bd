<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RequestQuote;
use App\Models\RequestQuotesReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\userMail;

class RequestAquoteController extends Controller
{
    /**
     * List of all blogs
     */
    public function index()
    {
       $requestsQuotes = RequestQuote::latest()->get();
        return view('admin.pages.request_quotes.index', [
            'requestsQuotes' => $requestsQuotes
        ]);
    }
    /**
     * show single blog details
     */
    public function show($id)
    {
        $requestQuote  = RequestQuote::findOrFail($id);
        return view('admin.pages.request_quotes.show', [
            'requestQuote' => $requestQuote
        ]);
    }
    public function reply($id){
        $requestQuote =  RequestQuote::where('id', $id)->first();
        $requestQuotesReply =  RequestQuotesReply::where('request_quotes_id', $requestQuote->id)->first();
        return view('admin.pages.request_quotes.reply', [
            'requestQuote' => $requestQuote,
            'requestQuotesReply' => $requestQuotesReply,
        ]);
    }
    public function replyStore(Request $request){
        try {

            $mailData = [
                'email' => $request->email,
                'message' => $request->message,
                'request_quotes_id' => $request->request_quotes_id
            ];

            Mail::to($request->email)->queue(new userMail($mailData));;
            return redirect()->back()->with('success', 'Email sent successfully');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went rong!');
        }

    }

}

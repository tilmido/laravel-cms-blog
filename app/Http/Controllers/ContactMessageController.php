<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactMessage;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Event;
use Illuminate\Http\Response;

class ContactMessageController extends Controller {

    //get post and pages of post
    public function getContactIndex() {
        return view('frontend.other.contact');
    }

    public function postSend(Request $request) {
        $this->validate($request, [
            'full_name' => 'required|max:50',
            'email' => 'required|email',
            'subject' => 'required|max:120',
            'message' => 'required|min:20',
        ]);
        $message = new ContactMessage();
        $message->full_name = $request['full_name'];
        $message->email = $request['email'];
        $message->message = $request['message'];
        $message->subject = $request['subject'];
        $message->save();
        Event::fire(new MessageSent($message));
        return redirect()->route('contact')->with(['success' => 'Message send successfuly.']);
    }

    public function getMessages() {
        $contactMessages = ContactMessage::paginate(5);
        return view('admin.email.messages', ['contactMessages' => $contactMessages]);
    }

    public function postMessageDelete(Request $request) {
        $id = $request['message_id'];
        $message = ContactMessage::find($id);
//        if (!$message) {
//            return Response::json(['fail' => 'message not found.'], 404);
//        }
        if ($message->delete()) {
            return Response::json(['success' => 'Delete successfuly.'], 200);
        }
        return Response::json(['fail' => 'message not found.'], 404);
    }

}

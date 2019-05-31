<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notify;
use App\Http\Utility;
use App\Subscriber;
use \Exception;

class NotificationController extends Controller
{
    private $notification;
    private $time;
    private $status;
    private $id;

    function __construct(Request $request){
        $this->notification = $request->input('notification');
        $this->time = $request->input('time');
        $this->status = $request->input('status');
        $this->id = $request->input('id');
    }

    /**
     * request data
     */
    private function requestData(){
        return $data  = [
            'notification'=>$this->notification,
            'time'=>$this->time,
            'status'=>$this->status
        ];
    }

    /**
     * request rules
     */
    private function requestRules(){
        return $rules = [
            'notification'=>'bail|required|string',
            'time'=>'bail|required|string',
            'status'=>'bail|required|numeric'
        ];
    }

    /**
     * create a notofication
     */
    public function create(){
        $data = $this->requestData();
        $rules = $this->requestRules();
        $v = Utility::validateData($data,$rules);
        if($v->fails()){
            return back()->withErrors($v->messages()->all(),'add_notification')->withInput();
        }
        $notification = new Notify;
        $notification->notification = $this->notification;
        $notification->time = $this->time;
        $notification->status = $this->status;
        $notification->deletable = 1;
        $notification->updatable = 1;
        $notification->subscriber_id = session('subscriber_id');
        if($notification->save()){
            return back()->with('success','Notification added successfully');
        }
        return back()->withErors(['An error couured, please try again'],'error');
    
    }

    /**
     * get edit page for a notification
     */
    public function edit($id){
       
        $notification = Notify::findOrFail($id);
        return view('edit_notification',['notification'=>$notification]);
    
    }

    /**
     * update a notofication
     */
    public function update(){
       
        $notification = Notify::findOrFail($this->id);
        $data = $this->requestData();
        $rules = $this->requestRules();
        $v = Utility::validateData($data,$rules);
        if($v->fails()){
            return back()->withErrors($v->messages()->all(),'update_notification')->withInput();
        }
        if($notification->updatable == 0){
            $notification->time = $this->time;
            $notification->status  = $this->status;
        }else{
                $notification->notification = $this->notification;
                $notification->time = $this->time;
                $notification->status  = $this->status;
        }
        
        if($notification->update()){
            return redirect('notifications')->with('success','Notification updated successfully');
        }
      
    }

    /**
     * delete a notification
     */
    public function delete($id){
     
        $notification = Notify::findOrFail($id);
        if($notification->deletable == 0){
            return back()->with('error','Default notofications are not deletable');
        }else{
            if($notification->delete()){
                return back()->with('error','Notification deleted successfully');
            }
        }
       
    }
}

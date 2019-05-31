<?php

namespace App\Http;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class Utility
{
    private $saltLength = 7;
    /**
     * log error
     * @param type $ex
     */
    public static function errorLog(\Exception $ex) {
        Log::info($ex->getMessage());
    }

    /**
     * log information
     */
    public static function info($param) {
        Log::info($param);
    }

    /**
     * generate random numbers
     */
    public static function GenerateRandomNumbers($num) {
        return substr( md5(rand()), 0, $num);
    }
    
    /**
     * validate incoming input requests
     * @param array $data
     * @param array $rules
     * @param array $messages
     * @return type
     */
    public static function validateData( array $data, array $rules) {
        return Validator::make($data,$rules);
    }
    
    /**
     * select chunks of data from table
     * @param \App\Http\Controllers\String $table
     * @param type $callback
     */
    public function selectByChunk(Model $model, int $chunk, $callback) {
       $model::chunk($chunk, function ($objects) {
          $callback($objects);
       }); 
    }
    
    /**
     * select by an array of primary keys
     * @param \App\Http\Controllers\Model $table
     * @param array $id
     */
    public function selectById(Model $model, array $id) {
        $obj = $model::find([$id]);
    }
    
    /**
     * insert into table and get inserted ID
     * @return row id
     */
    public static function insertGetId(String $table, array $params){
         $id = DB::table($table)->insertGetId([$params]);
    }
   
    
    /**
     * select a model conditionally
     * @param type $table
     * @param array $where
     * @return type
     */
    public static function selectRowByWhere(String $table, array $where) {
    $obj = DB::table($table)->where([$where])->first();
    return $obj;
    }
    
    /**
     * selects first row in a table
     * @param type $param
     * @return type
     */
    public static function selectOneRow(String $table) {
     $obj = DB::table($table)->first();
     return $obj;
    }
     
    /**
     * select all from a table
     * @param type $table
     * @param string $type [could be count or get, but not first]
     * @return type
     */
    public static function selectAll(String $table, String $type=null){
        if(is_null($type)){
            $type='get';
        }
            $obj = DB::table($table)->$type(); 
        return $obj;
    }
    
    /**
     * select a table with order by
     * @param \App\Http\Controllers\String $table
     * @param array $order
     * @return type
     */
    public function selectAllOrderBy(String $table, array $order) {
        $obj = DB::table($table)->orderBy($order['col'], $order['order'])->get; 
        return $obj;
    }
    
    /**
     * select all from a table based on an offset
     * @param type $table
     * @param type $limit_type
     * @param type $offset
     * @return type
     */
    public function selectByOffset(String $table, String $limit_type, int $offset=0) {
        $limit= $this->NavLimit($limit_type);
        $obj = DB::table($table)
                    ->offset($offset)
                    ->limit($limit)
                    ->get();
        return $obj;
    }
    
    protected function NavLimit($type) {
    $session_limit = !empty(session('nav_session'))?session('nav_session'):null;
    if($type=='minor'){
        if(!is_null($session_limit)){
            $nav_limit=$session_limit;
        } else {
            $nav_limit=5;
        }
    }
    if($type=='major'){
        if(!is_null($session_limit)){
            $nav_limit=$session_limit;
        } else {
            $nav_limit=20;
        }
    }
        return $nav_limit;
    
    }
    
    public function selectByLimit($param) {
        
    }
    
    /**
     * select conditionally by offset
     * @param \App\Http\Controllers\String $table
     * @param array $where
     * @param int $limit_type
     * @param int $offset
     * @return type
     */
    public function selectWhereByOffset(String $table, array $where,int $limit_type,int $offset=0) {
        $limit= $this->NavLimit($limit_type);
         DB::table($table)
                    ->offset($offset)
                    ->limit($limit)
                    ->where([$where])
                    ->get();
        return $obj;
    }
    
    /**
     * Update a table by Id
     * @param \App\Http\Controllers\String $table
     * @param array $upd
     * @param array $where
     */
    public static function updateById(String $table ,array $upd, array $where) {
        $obj = DB::table($table)
                 ->where([$where])
                 ->update($upd);
    }
    
    /**
     * Delete from table
     * @param type $table
     * @param array $where
     */
    public static function deleteById(String $table, array $where) {
               DB::table($table)
                ->where([$where])
                ->delete();
    }
    
    /**
     * checks if an object exist in database
     * @param \App\Http\Controllers\String $col
     * @param \App\Http\Controllers\String $table
     * @param \App\Http\Controllers\String $col_1
     * @param \App\Http\Controllers\String $val
     * @return type - an object if one exist, null if none
     */
    public static function objExistsInDB(String $col, String $table, String $col_1, String $val){
        $obj = DB::table($table)->where($col_1, $val)->value($col);
        if(is_null($obj)){
            return null;
        } else {
            return $obj;
        }
    }


    
    /**
     * returns a Json response
     * @param \App\Http\Controllers\String $response
     * @param type $data
     * @param type $redirect_url
     * @return type
     */
    public static function jsonResponse(String $response, $data=null, $redirect_url = null)
    {   switch ($response) {
            case 'ok': //a successfull get request
                $msg = ['code' => 200, 'status' => 'OK', 'message' => json_encode($data), 'redirect_url'=>$redirect_url];
                  return response()->json($msg)->header('Content-Type', 'application/json');
                 break;
            case 'created':  //new resource created successfully
                $msg = ['code' => 201, 'status' => 'Created', 'message' => json_encode($data), 'redirect_url'=>$redirect_url];
                return response()->json($msg)->header('Content-Type', 'application/json');
                break;
            case 'accepted':  //used for batch processing or qeueing
                $msg = ['code' => 202, 'status' => 'Accepted', 'message' => json_encode($data), 'redirect_url'=>$redirect_url];
                return response()->json($msg)->header('Content-Type', 'application/json');
                break;    
            case 'method_not_allowed': //method mis-match; using post instead of get or vice-versa
                $msg = ['code' => 405, 'status' => 'method_not_allowed', 'message' => json_encode($data), 'redirect_url'=>$redirect_url];
                  return response()->json($msg)->header('Content-Type', 'application/json');
                 break;
            case 'not_acceptable': //method mis-match; using post instead of get or vice-versa
                 $msg = ['code' => 406, 'status' => 'not_acceptable', 'message' => json_encode($data), 'redirect_url'=>$redirect_url];
                   return response()->json($msg)->header('Content-Type', 'application/json');
                  break;     
            case 'bad_request': //bad request due to invalid syntax
                 $msg = ['code' => 400, 'status' => 'bad_request', 'message' => json_encode($data), 'redirect_url'=>$redirect_url];
                  return response()->json($msg)->header('Content-Type', 'application/json');
                 break;
            case 'not_found': //bad request due to invalid syntax
                 $msg = ['code' => 404, 'status' => 'not_found', 'message' => json_encode($data), 'redirect_url'=>$redirect_url];
                  return response()->json($msg)->header('Content-Type', 'application/json');
                 break;     
            case 'internal_error': //server/database error
                 $msg = ['code' => 500, 'status' => 'internal_error', 'message' => json_encode($data), 'redirect_url'=>$redirect_url];
                  return response()->json($msg)->header('Content-Type', 'application/json');
                 break;     
            default:
                 break;
        }    
    }
      
    public function ajaxResponseCallback($type,$text,$callback=null,$mass_load=null) {
       return json_encode(array('type'=>$type,'text'=>$text,'content'=>$callback, 'mass_load'=>$mass_load));
       exit;
    }
      
    protected function insertLoginDetails($table,$username,$password,$id_field,$obj_id){
       $query = "INSERT INTO $table (username,password,$id_field)values('$username','$password','$obj_id')";
       $this->safeQuery($query);
   }
    
    public function generateSaltedHash($string, $salt=NULL) 
    { 
    return $this->getSaltedHash($string, $salt); 
    } 

    public function getSaltedHash($string, $salt=NULL) 
    { 
    /* 
    * Generate a salt if no salt is passed 
    */ 
    if ( $salt==NULL ) 
    { 
    $salt = substr(md5(time()), 0, $this->saltLength); 
    } 
    /* 
    * Extract the salt from the string if one is passed 
    */ 
    else 
    { 
    $salt = substr($salt, 0, $this->saltLength); 
    }
    return $salt . sha1($salt . $string); 
    } 

    public function getUserPassword($table,$search,$username){
        $result = $this->selectObject('password', $table, $search, $username);
    if($result)
    {
        return $result;
    } else {
        return null;
    }
    }
    
    public static function authenticateUser($model,$username,$username_val,$pass,$pass_val){
        $user = $model::where($username,$username_val)->where($pass,$pass_val)->first();
      if($user){
          return $user;
      }else{
          return null;
      }
    }
   
    /**
     * get the present time stamp
     */
    public static function getDate() {
        return  date('d-m-Y H:i:s');
    }
    
    public static function decodeObj($code) {
        $str = '';
       if($code==0){
           $str .=<<<str
          <span class="btn btn-danger">Unapproved</span>         
str;
       } 
       if($code==1){
           $str .=<<<str
          <span class="btn btn-success">Approved</span>         
str;
       } 
       if($code==2){
           $str .=<<<str
          <span class="btn btn-warning">Pending</span>         
str;
       }
       if($code==3){
        $str .=<<<str
       <span class="btn btn-warning">Awaits Admin</span>         
str;
    }
    if($code==4){
        $str .=<<<str
       <span class="btn btn-warning">Awaits User</span>         
str;
    }
       return $str;
    }
    
    public function userTimer($location,$id){
    if(session('timer') && time() - session('timer') > 10*60)
    {
        //session
        unset($_SESSION[$id]);
        unset($_SESSION['timer']);
    ?>
    <script>
        alert("Your Session is Over. Please Login to continue");  
    window.location = "<?=$location?>";
    </script>
   <?php
    }
     else {
          $_SESSION['timer']=time();
          ?>
        <script>
           window.setTimeout(function(){
             window.location.href = window.location;     
             }, 19000000);
       </script>
        <?php
    }
}

/**
 * Hash a paasword
 */
public static function hashPassword($password){
    $new_pass = Hash::make($password);
    return $new_pass;
}

/**
 * Check password
 */
public static function checkPassword($plain,$password){
   $check = Hash::check($plain,$password);
   return $check;
}

function ipApi(){
    $ip = $_REQUEST['REMOTE_ADDR']; // the IP address to query
    $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
    if($query && $query['status'] == 'success') {
        return array (
            'status' => $query['status'],
            'country' => $query['country'],
            'countryCode' => $query['countryCode'],
            'region' => $query['regionCode'],
            'regionName' => $query['regionName'],
            'city' => $query['city'],
            'lat' => $query['lat'],
            'lon' => $query['lon'],
            'timezone' => $query['timezone'],
            'isp' => $query['isp'],
            'ip' => $query['query']
        );
    }
}

/**
 * converts a date to word
 */
public static function dateToWords($date,$time=null){
    if(empty($date) || $date==null){
        return '';
    }
    if($time){
        $date =  date('j,F Y H:i:s', strtotime($date));
    }else{
        $date = date('j,F Y', strtotime($date));
    }
    return  $date;
  }

  /**
   * send general message
   */
  public static function sendMessage($table,$sender,$reciever,$title,$msg){
    DB::insert("insert into $table (sender_id, reciever_id, title,message) values ('$sender','$reciever','$title','$msg')");
  }

}

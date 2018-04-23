<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\Model\KullaniciModel;

class EpostaSistemi extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(/*$title*/)
    {   
         // $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $user = KullaniciModel::where("eposta",$request->get("eposta"))->first();
        if($user != null)
        {
            $mail = $user->eposta;
            $adi = $user->adiniz;
            $no = $user->kullanici_id;

       /* Mail::send(['text'=>'Mailicerik'],$user, function($message) use ($user){
            $message->to($user->eposta)->subject("Kullanıcı Sıfırlama");
            $message->from('gul.goger@gmail.com','Karakaş Ayakkabı Şifre Sıfırlama İletisi');
          });
          */

          return $this->view("Mailicerik",["isim"=>$adi,"no"=>$no])->to($mail);  
    }        
      //  return $this->from("gul.goger@gmail.com")->view('view.Mailicerik');
    }
}

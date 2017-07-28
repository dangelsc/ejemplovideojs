<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Video;
use App\comentario;
class videocontroller extends Controller
{
    public function index(){
        return view('videos');
    }
    public function subir(){
        return view('subir');
    }
    public function lista(){
        return ['lista'=>Video::all()];
    }
    public function listacomentario($id){
        return ['lista'=>Comentario::where('idvideo',$id)->get()];
    }
     public function visto($id){
        $p=Video::find($id);
        $p->visto++;
        $p->save();
        return ['visto'=>$p->visto];
    }
    public function subir2(Request $r ){
        $vi=new Video;
        $vi->formato=$r->file('video')->getClientOriginalExtension();
        $vi->direccion=$r->file('video')->getClientOriginalExtension();
        $vi->visto=0;
        $vi->save();
        $r->file('video')->move(
        base_path() . '/public/video/', $vi->id.'.'.$vi->direccion);
        return Redirect('/');
    }
    public function addcomentario(Request $r,$id){
        $vi=new Comentario;
        $vi->comentario=$r->input('comentario');
        $vi->idvideo=$id;
        $vi->save();
        return ['estado'=>1];
    }
}

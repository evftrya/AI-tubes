<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ButTitikController;
use App\Http\Controllers\HewanController;
use App\Http\Controllers\TitikController;
use App\Models\info;

class InfoController extends Controller
{
    public function index($siapa)
    {
        $ButTitiks = new ButTitikController();
        $titikss = new TitikController();
        $hew = new HewanController();
        $Lines = $titikss->all();
        $hewans = $hew->all();
        // dd($titiks);
        $titiks= $ButTitiks->all();
        $arys = $this->GetAllInfo();
        $start = 0;
        $end = 0;
        if($siapa =='all'){
            $start = 0;
            $end = count($titiks);
            return view('setInfo',['titiks'=>$titiks,'lines'=>$Lines,'hewans'=>$hewans,'arys'=>$arys,'start'=>$start,'end'=>$end,'siapa'=>$siapa]);
        }
        elseif($siapa=='dika'){
            $start = 0;
            $end = 69;
            return view('setInfo',['titiks'=>$titiks,'lines'=>$Lines,'hewans'=>$hewans,'arys'=>$arys,'start'=>$start,'end'=>$end,'siapa'=>$siapa]);
        }
        elseif($siapa=='ageng'){
            $start = 69;
            $end = 138;
            return view('setInfo',['titiks'=>$titiks,'lines'=>$Lines,'hewans'=>$hewans,'arys'=>$arys,'start'=>$start,'end'=>$end,'siapa'=>$siapa]);
        }
    }
    public function final(){
        $ButTitiks = new ButTitikController();
        $titikss = new TitikController();
        $hew = new HewanController();
        $info = new InfoController();
        $Lines = $titikss->all();
        $hewans = $hew->all();
        // dd($titiks);
        $titiks= $ButTitiks->all();
        $arys = $info->GetAllInfo();
        $butInfo = $ButTitiks->GetTitikBut();
        return view('finalPage',['titiks'=>$titiks,'lines'=>$Lines,'hewans'=>$hewans,'arys'=>$arys,'butInfos'=>$butInfo,'butfill'=>[]]);
    }
    public function Rute(Request $request)
    {
        // dd($request);
        // dd($request->garisx1);
        // Simpan hanya nama dan jarak dalam database
        $request->validate([
            'inpTujuan' => 'required',
            'inpAwal' => 'required'

        ]);
        $tujuan = $this->getTitikTujuan($request->inpTujuan);
        // dd($tujuan);
        $tc = new TitikController();
        $finalResult = [];
        $hasils = [];
        $shortest = 0;
        $index = 0;
        $itg = 0;
        $backAll = [];
        // dd($tujuan);
        foreach($tujuan as $tuju){
            $jarak = $tc->FindRute($tuju,$request->inpAwal);
            // dd($jarak);
            $backAll=$jarak;
            array_push($hasils, $jarak);
            if($shortest==0){
                $shortest = $jarak[0];
                $index = $itg;
            }
            elseif($shortest>$jarak[0]){
                $shortest=$jarak[0];
                $index = $itg;
            }
            $itg = $itg+1;
        }
        // dd("hasil",$hasils,"tujuan",$tujuan,"awal",$request->inpAwal,"akhir",$request->inpTujuan);

        // array_push($finalResult,$hasils[$index]);
        // dd($finalResult[0][1]);
        // $back = [];
        // array_push($back,$finalResult[0][0]);
        // $dataLines = [];
        // for($q=(count($finalResult[0][1])-1);$q>=0;$q--){
        //     if($q!=0){
        //         // echo $q." ".$q-1;
        //         $dataline = $tc->getLiness($finalResult[0][1][$q],$finalResult[0][1][$q-1]);
        //         // dd($dataline);
        //         array_push($dataLines,$dataline);
        //     }
        // }
        // array_push($back,$dataLines);
        // dd($back);

        

        // //persiapan masuk page
        // $ButTitiks = new ButTitikController();
        // $titikss = new TitikController();
        // $hew = new HewanController();
        // $Lines = $titikss->all();
        // $hewans = $hew->all();
        // // dd($titiks);
        // $titiks= $ButTitiks->all();
        // $arys = $this->GetAllInfo();
        // $ShowLines = $back;

        // dd($backAll);
        $green = [];
        $red = [];
        $indexShort=0;
        for($k=0;$k<count($backAll);$k++){
            if($backAll[$indexShort][0]>$backAll[$k][0]){
                $indexShort = $k;
            }
            
        }
        // dd($indexShort);
        for($t=0;$t<count($backAll);$t++){
            if($t==$indexShort){
                array_push($green,$backAll[$t]);

            }
            else{
                array_push($red,$backAll[$t]);
            }
        }
        
        //persiapan lines

        // $reds = [];
        // dd($red);
        $reds = $this->getlines($red);
        $greens = $this->getlines($green);

        // dd($red,$green);
        //gabungline

        $gabung = [];
        foreach($reds as $res){
            // dd($res[1]);
            for($c=0;$c<count($res[1]);$c++){
                // dd($res[1][$c]);
                $temp = $res[1][$c];
                array_push($temp,"red");
                array_push($temp,"abai");
                $sama = 0;
                if(count($gabung)==0){
                    array_push($gabung,$temp);
                }
                else{
                    $hitung=0;
                    // var_dump($gabung);
                    // echo"<br>";
                    // var_dump($temp);
                    // echo"<br><br>";

                    
                    foreach($gabung as $gab){
                        if($gab[0]==$temp[0] && $gab[3]==$temp[3]){
                            $sama = 1;
                        }
                    }

                    if($sama==0){
                        array_push($gabung,$temp);

                    }
                    
                }
                

            }
        }

        foreach($greens as $res){
            // dd($res[1]);
            for($c=0;$c<count($res[1]);$c++){
                // dd($res[1][$c]);
                $temp = $res[1][$c];
                array_push($temp,"green");
                if($c==0){
                    array_push($temp,"start");
                }
                else if($c==count($res[1])-1){
                    array_push($temp,"end");
                }
                else{
                    array_push($temp,"abai");
                }
                $sama = 0;
                    $hitung=0;
                    // var_dump($gabung);
                    // echo"<br>";
                    // var_dump($temp);
                    // echo"<br><br>";

                    $itg = 0;
                    foreach($gabung as $gab){
                        if($gab[0]==$temp[0] && $gab[3]==$temp[3]){
                            $sama = 1;
                            $gab[6]="green";
                            $gabung[$itg][6]="green";
                            if($c==0){
                                $gabung[$itg][7]="start"; 
                            }
                            else if($c==count($res[1])-1){
                                $gabung[$itg][7]="end"; 

                            }

                        }
                        $itg=$itg+1;
                    }

                    if($sama==0){
                        array_push($gabung,$temp);

                    }
                

            }
        }
        // dd($gabung, $green);
        

        // dd($greens,$reds);
        
        return view('rute',['gabung'=>$gabung]);

        
        
    }
    public function getlines($ary){
        $arys= $ary;
        $tc= new TitikController();
        $back = [];
        for($q=0;$q<count($arys);$q++){
            // dd($arys[$q]);
            array_push($back,array());
            // dd($back);
            array_push($back[$q],$arys[$q][0]);
            // dd($back,$arys[$q]);
            array_push($back[$q],array());
            // dd($back,$arys[0][1]);
            $itung = 0;
            for($b=(count($arys[$q][1])-1);$b>0;$b--){
                if($b!=0){
                    // dd($b,$b-1,$arys[$q][1]);
                    $titik = $tc->getLiness($arys[$q][1][$b],$arys[$q][1][$b-1]);
                    array_push($back[$q][1],$titik);
                    // dd($back[$q][1]);
                    // array_push($back[$q][1][$itung],$titik);
                    // dd($titik,$back);
                }
                else{

                }
                $itung = $itung + 1;

            }
            // dd($back);
            // for($b=count();$b)
        }
        return($back);
        // $titik = $tc->getLiness($titikAwals,$titikAkhirs);
    }

    
    
    public function getTitikTujuan($lokasi){
        $titik = Info::select('Titik')
            ->where('Lokasi_atau_hewan', $lokasi)
            ->get();
        // dd($titik);
        $ary=[];
        foreach($titik as $ti){
            array_push($ary,$ti->Titik);
        }
        return $ary;
    }
    public function store(Request $request,$siapa)
    {
        // dd($request);
        // dd($request->garisx1);
        // Simpan hanya nama dan jarak dalam database
        $request->validate([
            'titik' => 'required',
            'NamaHewan' => 'required'

        ]);
        $arry = explode(",",$request->NamaHewan);
        // dd($arry);
        foreach($arry as $r){
            $titik = new info();
            $titik->Titik = $request->titik;
            $titik->Lokasi_atau_hewan = $r;
            $titik->save();
        }
        

        return redirect('/setinfo/'.$siapa);
    }
    public function cek(){
        // $this->getinfo('tes');
        $this->GetAllInfo();
    }

    public function GetAllInfo(){
        $ButTitiks = new ButTitikController();
        $titikss = new TitikController();
        $hew = new HewanController();
        $Lines = $titikss->all();
        $hewans = $hew->all();
        // dd($titiks);
        $titiks= $ButTitiks->all();
        // dd($titiks);
        $arys = [];
        foreach($titiks as $titik){
            $ary = [];
            array_push($ary,$titik->Nama);
            $isi = $this->getinfo($titik->Nama);
            array_push($ary,$isi);
            array_push($arys, $ary);
        }
        // dd($arys);
        return $arys;
        
        
    }
    public function getinfo($titik){
        $results = Info::where('Titik', $titik)
                    ->orderBy('Lokasi_atau_hewan', 'asc')
                    ->pluck('Lokasi_atau_hewan');

        // dd($titik,$results);
        $ary = [];
        // dd(count($ary));
        if(count($results)>0){
            foreach($results as $a){
                array_push($ary,$a);
            }
        }
        return $ary;
    }
}

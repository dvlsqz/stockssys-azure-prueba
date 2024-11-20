<?php set_time_limit(0);
ini_set("memory_limit",-1);
ini_set('max_execution_time', 0); ?>
@extends('admin.plantilla.master')
@section('title','Solicitud A Bodega Primaria')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/escuelas') }}"><i class="fa-solid fa-route"></i> Solicitud de Despacho</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/escuela/registrar') }}"><i class="fa-solid fa-route"></i> Registrar Solicitud de Despacho</a></li>
@endsection
 
@section('content')
<div class="container-fluid">
    <div class="row">       
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title"><strong><i class="fa-solid fa-file-invoice"></i> Informacion Detallada Para Realizar Solicitud A Bodega Primaria</strong></h2>
                    
                </div>

                <div class="card-body" style="text-align:center;  overflow-y: scroll; line-height: 1em; height:400px; font-size:18px;">
                    @foreach($escuelas as $e)
                        <p style="color: blue;"><b>{{ $loop->iteration.'. '.$e->escuela }} </b></p>
                        <div class="row">
                            <div class="col-md-3" >
                                    @php($tipo_racion_escolar = 0)
                                    @php($id_escuela = 0)
                                    @foreach($det_escuelas_preprimaria_enc as $det_preprimaria_enc)
                                        @if($det_preprimaria_enc->escuela_id == $e->escuela_id)    
                                            Racion:  <b> {{ $det_preprimaria_enc->racion}}</b> &nbsp                                    
                                            Dias: <b>{{ $det_preprimaria_enc->dias}} </b>&nbsp
                                            Total Beneficiarios:  <b>{{ $det_preprimaria_enc->total_beneficiarios}}  </b>
                                            @php($tipo_racion_escolar = $det_preprimaria_enc->idracion)
                                            @php($id_escuela = $det_preprimaria_enc->escuela_id )
                                            
                                        @endif                                   
                                    @endforeach 
                                   
                                    @if($tipo_racion_escolar == 1)
                                        <br>
                                        <b>Desgloce: </b>  <br>
                                        <br>   
                                        @foreach($det_escuelas_preprimaria as $det_preprimaria)
                                            @if($det_preprimaria->escuela_id == $e->escuela_id)      
                                                @if($det_preprimaria->alimento_peso != 0)                                  
                                                    <b><i class="fa-solid fa-caret-right"></i></b> Alimento: <b>{{ $det_preprimaria->alimento}}</b> Peso Ración (gr.): <b>{{ $det_preprimaria->alimento_peso}} </b><br>
                                                    @if( Illuminate\Support\Str::lower($det_preprimaria->alimento) != "aceite" )
                                                    - Gramos: <b>{{ number_format( ($det_preprimaria->dias*$det_preprimaria->total_beneficiarios*$det_preprimaria->alimento_peso), 2, '.', ',' )}} </b><br>
                                                    - Quintales: <b>{{ number_format( ((($det_preprimaria->dias*$det_preprimaria->total_beneficiarios*$det_preprimaria->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b><br>
                                                    - Unidades Racion: <b>{{ number_format( ((($det_preprimaria->dias*$det_preprimaria->total_beneficiarios*$det_preprimaria->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b> <br>
                                                    @else
                                                    - Gramos: <b>{{ number_format( ($det_preprimaria->dias*$det_preprimaria->total_beneficiarios*$det_preprimaria->alimento_peso), 2, '.', ',' )}} </b><br>
                                                    - Quintales: <b>{{ number_format( ((($det_preprimaria->dias*$det_preprimaria->total_beneficiarios*$det_preprimaria->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b><br>
                                                    - Unidades Racion: <b>{{ number_format( ((($det_preprimaria->dias*$det_preprimaria->total_beneficiarios*$det_preprimaria->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b> <br>
                                                    @endif
                                                    <br>
                                                @endif
                                            @endif
                                        @endforeach 
                                    @elseif($tipo_racion_escolar == 6)   
                                        @foreach($det_escuelas_preprimaria_ex_enc as $det_preprimaria_enc_ex)
                                            @if($det_preprimaria_enc_ex->escuela_id == $e->escuela_id)    
                                                Racion:  <b> {{ $det_preprimaria_enc_ex->racion}}</b> &nbsp                                    
                                                Dias: <b>{{ $det_preprimaria_enc_ex->dias}} </b>&nbsp
                                                Total Beneficiarios:  <b>{{ $det_preprimaria_enc_ex->total_beneficiarios}}  </b>
                                            @endif                                   
                                        @endforeach   
                                        <br>
                                        <b>Desgloce: </b>  <br>
                                        <br>       
                                        <span style="color: red;"> Datos de ración de expansion</span><br> 
                                        @foreach($det_escuelas_preprimaria_ex as $det_preprimaria_ex)
                                            @if($det_preprimaria_ex->escuela_id == $e->escuela_id)   
                                                @if($det_preprimaria_ex->alimento_peso != 0)                                     
                                                    <b><i class="fa-solid fa-caret-right"></i></b> Alimento: <b>{{ $det_preprimaria_ex->alimento}}</b> Peso Ración (gr.): <b>{{ $det_preprimaria_ex->alimento_peso}} </b><br>
                                                    @if( Illuminate\Support\Str::lower($det_preprimaria_ex->alimento) != "aceite" )
                                                    - Gramos: <b>{{ number_format( ($det_preprimaria_ex->dias*$det_preprimaria_ex->total_beneficiarios*$det_preprimaria_ex->alimento_peso), 2, '.', ',' )}} </b><br>
                                                    - Quintales: <b>{{ number_format( ((($det_preprimaria_ex->dias*$det_preprimaria_ex->total_beneficiarios*$det_preprimaria_ex->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b><br>
                                                    - Unidades Racion: <b>{{ number_format( ((($det_preprimaria_ex->dias*$det_preprimaria_ex->total_beneficiarios*$det_preprimaria_ex->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b> <br>
                                                    @else
                                                    - Gramos: <b>{{ number_format( ($det_preprimaria_ex->dias*$det_preprimaria_ex->total_beneficiarios*$det_preprimaria_ex->alimento_peso), 2, '.', ',' )}} </b><br>
                                                    - Quintales: <b>{{ number_format( ((($det_preprimaria_ex->dias*$det_preprimaria_ex->total_beneficiarios*$det_preprimaria_ex->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b><br>
                                                    - Unidades Racion: <b>{{ number_format( ((($det_preprimaria_ex->dias*$det_preprimaria_ex->total_beneficiarios*$det_preprimaria_ex->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b> <br>
                                                    @endif
                                                    <br>
                                                @endif
                                            @endif
                                        @endforeach 
                                    @else
                                        @php($id_escuela_aux = 0)
                                            @foreach($det_escuelas_preprimaria_sllr_enc as $det_preprimaria_enc_sllr)
                                                @if($det_preprimaria_enc_sllr->escuela_id == $e->escuela_id)    
                                                    @php($id_escuela_aux = $det_preprimaria_enc_sllr->escuela_id)
                                                @endif                                   
                                            @endforeach   
                                            @if($id_escuela_aux == 159)
                                            @foreach($det_escuelas_preprimaria_sllr_enc as $det_preprimaria_enc_sllr)
                                                @if($det_preprimaria_enc_sllr->escuela_id == $e->escuela_id)    
                                                    Racion:  <b> {{ $det_preprimaria_enc_sllr->racion}}</b> &nbsp                                    
                                                    Dias: <b>{{ $det_preprimaria_enc_sllr->dias}} </b>&nbsp
                                                    Total Beneficiarios:  <b>{{ $det_preprimaria_enc_sllr->total_beneficiarios}}  </b>
                                                @endif                                   
                                            @endforeach   
                                            <br>
                                            <b>Desgloce: </b>  <br>
                                            <br>       
                                            <span style="color: red;"> Datos de ración de SLLR</span><br> 
                                            @foreach($det_escuelas_preprimaria_sllr as $det_preprimaria_sllr)
                                                @if($det_preprimaria_sllr->escuela_id == $e->escuela_id)   
                                                    @if($det_preprimaria_sllr->alimento_peso != 0)                                     
                                                        <b><i class="fa-solid fa-caret-right"></i></b> Alimento: <b>{{ $det_preprimaria_sllr->alimento}}</b> Peso Ración (gr.): <b>{{ $det_preprimaria_sllr->alimento_peso}} </b><br>
                                                        @if( Illuminate\Support\Str::lower($det_preprimaria_sllr->alimento) != "aceite" )
                                                        - Gramos: <b>{{ number_format( ($det_preprimaria_sllr->dias*$det_preprimaria_sllr->total_beneficiarios*$det_preprimaria_sllr->alimento_peso), 2, '.', ',' )}} </b><br>
                                                        - Quintales: <b>{{ number_format( ((($det_preprimaria_sllr->dias*$det_preprimaria_sllr->total_beneficiarios*$det_preprimaria_sllr->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b><br>
                                                        - Unidades Racion: <b>{{ number_format( ((($det_preprimaria_sllr->dias*$det_preprimaria_sllr->total_beneficiarios*$det_preprimaria_sllr->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b> <br>
                                                        @else
                                                        - Gramos: <b>{{ number_format( ($det_preprimaria_sllr->dias*$det_preprimaria_sllr->total_beneficiarios*$det_preprimaria_sllr->alimento_peso), 2, '.', ',' )}} </b><br>
                                                        - Quintales: <b>{{ number_format( ((($det_preprimaria_sllr->dias*$det_preprimaria_sllr->total_beneficiarios*$det_preprimaria_sllr->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b><br>
                                                        - Unidades Racion: <b>{{ number_format( ((($det_preprimaria_sllr->dias*$det_preprimaria_sllr->total_beneficiarios*$det_preprimaria_sllr->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b> <br>
                                                        @endif
                                                        <br>
                                                    @endif
                                                @endif
                                            @endforeach 
                                        @else
                                            @foreach($det_escuelas_preprimaria_ordinario_enc as $det_preprimaria_enc_ordinario)
                                                @if($det_preprimaria_enc_ordinario->escuela_id == $e->escuela_id)    
                                                    Racion:  <b> {{ $det_preprimaria_enc_ordinario->racion}}</b> &nbsp                                    
                                                    Dias: <b>{{ $det_preprimaria_enc_ordinario->dias}} </b>&nbsp
                                                    Total Beneficiarios:  <b>{{ $det_preprimaria_enc_ordinario->total_beneficiarios}}  </b>
                                                @endif                                   
                                            @endforeach   
                                            <br>
                                            <b>Desgloce: </b>  <br>
                                            <br>       
                                            <span style="color: red;"> Datos de ración de ordinario</span><br> 
                                            @foreach($det_escuelas_preprimaria_ordinario as $det_preprimaria_ordinario)
                                                @if($det_preprimaria_ordinario->escuela_id == $e->escuela_id)   
                                                    @if($det_preprimaria_ordinario->alimento_peso != 0)                                     
                                                        <b><i class="fa-solid fa-caret-right"></i></b> Alimento: <b>{{ $det_preprimaria_ordinario->alimento}}</b> Peso Ración (gr.): <b>{{ $det_preprimaria_ordinario->alimento_peso}} </b><br>
                                                        @if( Illuminate\Support\Str::lower($det_preprimaria_ordinario->alimento) != "aceite" )
                                                        - Gramos: <b>{{ number_format( ($det_preprimaria_ordinario->dias*$det_preprimaria_ordinario->total_beneficiarios*$det_preprimaria_ordinario->alimento_peso), 2, '.', ',' )}} </b><br>
                                                        - Quintales: <b>{{ number_format( ((($det_preprimaria_ordinario->dias*$det_preprimaria_ordinario->total_beneficiarios*$det_preprimaria_ordinario->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b><br>
                                                        - Unidades Racion: <b>{{ number_format( ((($det_preprimaria_ordinario->dias*$det_preprimaria_ordinario->total_beneficiarios*$det_preprimaria_ordinario->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b> <br>
                                                        @else
                                                        - Gramos: <b>{{ number_format( ($det_preprimaria_ordinario->dias*$det_preprimaria_ordinario->total_beneficiarios*$det_preprimaria_ordinario->alimento_peso), 2, '.', ',' )}} </b><br>
                                                        - Quintales: <b>{{ number_format( ((($det_preprimaria_ordinario->dias*$det_preprimaria_ordinario->total_beneficiarios*$det_preprimaria_ordinario->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b><br>
                                                        - Unidades Racion: <b>{{ number_format( ((($det_preprimaria_ordinario->dias*$det_preprimaria_ordinario->total_beneficiarios*$det_preprimaria_ordinario->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b> <br>
                                                        @endif
                                                        <br>
                                                    @endif
                                                @endif
                                            @endforeach 
                                        @endif
                                        
                                    @endif
                            </div>
                            <div class="col-md-3">
                                    @php($tipo_racion_escolar2 = 0)
                                    @php($id_escuela2 = 0)
                                    @foreach($det_escuelas_primaria_enc as $det_primaria_enc)
                                        @if($det_primaria_enc->escuela_id == $e->escuela_id)    
                                            Racion:  <b>{{ $det_primaria_enc->racion}}</b>  &nbsp                                    
                                            Dias:  <b>{{ $det_primaria_enc->dias}} </b> &nbsp
                                            Total Beneficiarios:  <b> {{ $det_primaria_enc->total_beneficiarios}} </b> 
                                            @php($tipo_racion_escolar2 = $det_primaria_enc->idracion)
                                            @php($id_escuela2 = $det_primaria_enc->escuela_id)
                                        @endif                                   
                                    @endforeach 
                                     
                                    @if($tipo_racion_escolar2 == 1 || $tipo_racion_escolar2 == 3  )
                                        <br>
                                        <b>Desgloce: </b>  <br>
                                        <br>     
                                        @foreach($det_escuelas_primaria as $det_primaria)
                                            @if($det_primaria->escuela_id == $e->escuela_id)       
                                                @if($det_primaria->alimento_peso != 0)                                 
                                                    <b><i class="fa-solid fa-caret-right"></i></b>  Alimento: <b>{{ $det_primaria->alimento}} </b>Peso Ración (gr.): <b>{{ $det_primaria->alimento_peso}}</b>  <br>
                                                    @if( Illuminate\Support\Str::lower($det_primaria->alimento) != "aceite" )
                                                    - Gramos: <b>{{ number_format( ($det_primaria->dias*$det_primaria->total_beneficiarios*$det_primaria->alimento_peso), 2, '.', ',' )}} </b>  <br>
                                                    - Quintales: <b>{{ number_format( ((($det_primaria->dias*$det_primaria->total_beneficiarios*$det_primaria->alimento_peso)/453.59237)/100), 2, '.', ',' )}}</b>  <br>
                                                    - Unidades Racion: <b>{{ number_format( ((($det_primaria->dias*$det_primaria->total_beneficiarios*$det_primaria->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b> <br>
                                                    @else
                                                    - Gramos: <b>{{ number_format( ($det_primaria->dias*$det_primaria->total_beneficiarios*$det_primaria->alimento_peso), 2, '.', ',' )}}</b>  <br>
                                                    - Quintales: <b>{{ number_format( ((($det_primaria->dias*$det_primaria->total_beneficiarios*$det_primaria->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b> <br>
                                                    - Unidades Racion: <b>{{ number_format( ((($det_primaria->dias*$det_primaria->total_beneficiarios*$det_primaria->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b> <br>
                                                    @endif
                                                    <br>
                                                @endif
                                            @endif
                                        @endforeach                                         

                                    @elseif($tipo_racion_escolar2 == 9)
                                        @foreach($det_escuelas_primaria_ex_enc as $det_primaria_enc_ex)
                                            @if($det_primaria_enc_ex->escuela_id == $e->escuela_id)    
                                                Racion:  <b> {{ $det_primaria_enc_ex->racion}}</b> &nbsp                                    
                                                Dias: <b>{{ $det_primaria_enc_ex->dias}} </b>&nbsp
                                                Total Beneficiarios:  <b>{{ $det_primaria_enc_ex->total_beneficiarios}}  </b>
                                            @endif                                   
                                        @endforeach   
                                        <br>
                                        <b>Desgloce: </b>  <br>
                                        <br>       
                                        <span style="color: red;"> Datos de ración de expansion</span><br> 
                                        @foreach($det_escuelas_primaria_ex as $det_primaria_ex)
                                            @if($det_primaria_ex->escuela_id == $e->escuela_id)      
                                                @if($det_primaria_ex->alimento_peso != 0)                                  
                                                    <b><i class="fa-solid fa-caret-right"></i></b>  Alimento: <b>{{ $det_primaria_ex->alimento}} </b>Peso Ración (gr.): <b>{{ $det_primaria_ex->alimento_peso}}</b>  <br>
                                                    @if( Illuminate\Support\Str::lower($det_primaria_ex->alimento) != "aceite" )
                                                    - Gramos: <b>{{ number_format( ($det_primaria_ex->dias*$det_primaria_ex->total_beneficiarios*$det_primaria_ex->alimento_peso), 2, '.', ',' )}} </b>  <br>
                                                    - Quintales: <b>{{ number_format( ((($det_primaria_ex->dias*$det_primaria_ex->total_beneficiarios*$det_primaria_ex->alimento_peso)/453.59237)/100), 2, '.', ',' )}}</b>  <br>
                                                    - Unidades Racion: <b>{{ number_format( ((($det_primaria_ex->dias*$det_primaria_ex->total_beneficiarios*$det_primaria_ex->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b> <br>
                                                    @else
                                                    - Gramos: <b>{{ number_format( ($det_primaria_ex->dias*$det_primaria_ex->total_beneficiarios*$det_primaria_ex->alimento_peso), 2, '.', ',' )}}</b>  <br>
                                                    - Quintales: <b>{{ number_format( ((($det_primaria_ex->dias*$det_primaria_ex->total_beneficiarios*$det_primaria_ex->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b> <br>
                                                    - Unidades Racion: <b>{{ number_format( ((($det_primaria_ex->dias*$det_primaria_ex->total_beneficiarios*$det_primaria_ex->alimento_peso)/453.59237)/100), 2, '.', ',' )}} </b> <br>
                                                    @endif
                                                    <br>
                                                @endif
                                            @endif
                                        @endforeach 
                                    
                                        
                                        
                                    @endif
                            </div>
                            
                            <div class="col-md-3">
                                    @php($tipo_racion_lider = 0)
                                    @foreach($det_escuelas_l_enc as $det_l_enc)
                                        @if($det_l_enc->escuela_id == $e->escuela_id)    
                                            Racion: <b>  {{ $det_l_enc->racion}} </b>  &nbsp                                    
                                            Dias: <b>  {{ $det_l_enc->dias}} </b> &nbsp
                                            Total Beneficiarios: <b>  {{ $det_l_enc->total_beneficiarios}} </b> 
                                            @php($tipo_racion_lider = $det_l_enc->idracion)
                                        @endif                                   
                                    @endforeach 
                                      
                                    
                                    @if($tipo_racion_lider == 5)
                                        <br>
                                        <b>Desgloce: </b>  <br>
                                        <br>   
                                        @foreach($det_escuelas_l as $det_l)
                                            @if($det_l->escuela_id == $e->escuela_id)      
                                                @if($det_l->alimento_peso != 0)                                  
                                                    <b><i class="fa-solid fa-caret-right"></i> </b> Alimento: <b>{{ $det_l->alimento}} </b>Peso Ración (lbs.): <b>{{ $det_l->alimento_peso}} </b>  <br>
                                                    - Libras: <b>{{ number_format( ($det_l->dias*$det_l->total_beneficiarios*$det_l->alimento_peso), 2, '.', ',' )}} </b>  <br>
                                                    - Quintales: <b>{{ number_format( ((($det_l->dias*$det_l->total_beneficiarios*$det_l->alimento_peso))/100), 2, '.', ',' )}}</b>  <br>
                                                    - Unidades Racion: <b>{{ number_format( ((($det_l->dias*$det_l->total_beneficiarios*$det_l->alimento_peso)/100)), 2, '.', ',' )}}</b>  <br>
                                                    <br>
                                                @endif
                                            @endif
                                        @endforeach
                                    @elseif($tipo_racion_lider == 0)
                                        @foreach($det_escuelas_l_ordinario_enc as $det_l_enc_ordinario)
                                            @if($det_l_enc_ordinario->escuela_id == $e->escuela_id)    
                                                Racion:  <b> {{ $det_l_enc_ordinario->racion}}</b> &nbsp                                    
                                                Dias: <b>{{ $det_l_enc_ordinario->dias}} </b>&nbsp
                                                Total Beneficiarios:  <b>{{ $det_l_enc_ordinario->total_beneficiarios}}  </b>
                                            @endif                                   
                                        @endforeach   

                                        <br>
                                        <b>Desgloce: </b>  <br>
                                        <br>   
                                        <span style="color: red;"> Datos de ración de ordinario</span><br>
                                        @foreach($det_escuelas_l_ordinario as $det_l_ordinario)
                                            @if($det_l_ordinario->escuela_id == $e->escuela_id)       
                                                @if($det_l_ordinario->alimento_peso != 0)                                 
                                                    <b><i class="fa-solid fa-caret-right"></i> </b> Alimento: <b>{{ $det_l_ordinario->alimento}} </b>Peso Ración (lbs.): <b>{{ $det_l_ordinario->alimento_peso}} </b>  <br>
                                                    - Libras: <b>{{ number_format( ($det_l_ordinario->dias*$det_l_ordinario->total_beneficiarios*$det_l_ordinario->alimento_peso), 2, '.', ',' )}} </b>  <br>
                                                    - Quintales: <b>{{ number_format( ((($det_l_ordinario->dias*$det_l_ordinario->total_beneficiarios*$det_l_ordinario->alimento_peso))/100), 2, '.', ',' )}}</b>  <br>
                                                    - Unidades Racion: <b>{{ number_format( ((($det_l_ordinario->dias*$det_l_ordinario->total_beneficiarios*$det_l_ordinario->alimento_peso)/100)), 2, '.', ',' )}}</b>  <br>
                                                    <br>
                                                @endif
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach($det_escuelas_l_ex_enc as $det_l_enc_ex)
                                            @if($det_l_enc_ex->escuela_id == $e->escuela_id)    
                                                Racion:  <b> {{ $det_l_enc_ex->racion}}</b> &nbsp                                    
                                                Dias: <b>{{ $det_l_enc_ex->dias}} </b>&nbsp
                                                Total Beneficiarios:  <b>{{ $det_l_enc_ex->total_beneficiarios}}  </b>
                                            @endif                                   
                                        @endforeach   

                                        <br>
                                        <b>Desgloce: </b>  <br>
                                        <br>   
                                        <span style="color: red;"> Datos de ración de expansion</span><br>
                                        @foreach($det_escuelas_l_ex as $det_l_ex)
                                            @if($det_l_ex->escuela_id == $e->escuela_id)       
                                                @if($det_l_ex->alimento_peso != 0)                                 
                                                    <b><i class="fa-solid fa-caret-right"></i> </b> Alimento: <b>{{ $det_l_ex->alimento}} </b>Peso Ración (lbs.): <b>{{ $det_l_ex->alimento_peso}} </b>  <br>
                                                    - Libras: <b>{{ number_format( ($det_l_ex->dias*$det_l_ex->total_beneficiarios*$det_l_ex->alimento_peso), 2, '.', ',' )}} </b>  <br>
                                                    - Quintales: <b>{{ number_format( ((($det_l_ex->dias*$det_l_ex->total_beneficiarios*$det_l_ex->alimento_peso))/100), 2, '.', ',' )}}</b>  <br>
                                                    - Unidades Racion: <b>{{ number_format( ((($det_l_ex->dias*$det_l_ex->total_beneficiarios*$det_l_ex->alimento_peso)/100)), 2, '.', ',' )}}</b>  <br>
                                                    <br>
                                                @endif
                                            @endif
                                        @endforeach
                                        
                                    @endif
                            </div>
                            <div class="col-md-3">
                                    @php($tipo_racion_v_d = 0)
                                    @foreach($det_escuelas_v_d_enc as $det_v_d_enc)
                                        @if($det_v_d_enc->escuela_id == $e->escuela_id)    
                                            Racion: <b>  {{ $det_v_d_enc->racion}} </b>  &nbsp                                    
                                            Dias: <b>  {{ $det_v_d_enc->dias}}</b>  &nbsp
                                            Total Beneficiarios: <b>  {{ $det_v_d_enc->total_beneficiarios}} </b> 
                                            @php($tipo_racion_v_d  = $det_v_d_enc->idracion)
                                        @endif                                   
                                    @endforeach 
                                    

                                    @if($tipo_racion_v_d == 4)
                                        <br>
                                        <b>Desgloce: </b>  <br>
                                        <br>   
                                        @foreach($det_escuelas_v_d as $det_v_d)
                                            @if($det_v_d->escuela_id == $e->escuela_id)     
                                                @if($det_v_d->alimento_peso != 0)                                   
                                                    <b><i class="fa-solid fa-caret-right"></i></b>  Alimento: <b>{{ $det_v_d->alimento}} </b>Peso Ración (lbs.): <b>{{ $det_v_d->alimento_peso}} </b>  <br>
                                                    - Libras: <b>{{ number_format( ($det_v_d->dias*$det_v_d->total_beneficiarios*$det_v_d->alimento_peso), 2, '.', ',' )}}</b>  <br>
                                                    - Quintales: <b>{{ number_format( ((($det_v_d->dias*$det_v_d->total_beneficiarios*$det_v_d->alimento_peso)/100)), 2, '.', ',' )}}</b>  <br>
                                                    - Unidades Racion: <b>{{ number_format( ((($det_v_d->dias*$det_v_d->total_beneficiarios*$det_v_d->alimento_peso)/100)), 2, '.', ',' )}}</b>  <br>
                                                    <br>
                                                @endif
                                            @endif
                                        @endforeach
                                    @elseif($tipo_racion_v_d == 0)
                                        @foreach($det_escuelas_v_d_ordinario_enc as $det_v_d_enc_ordinario)
                                            @if($det_v_d_enc_ordinario->escuela_id == $e->escuela_id)    
                                                Racion: <b>  {{ $det_v_d_enc_ordinario->racion}} </b>  &nbsp                                    
                                                Dias: <b>  {{ $det_v_d_enc_ordinario->dias}}</b>  &nbsp
                                                Total Beneficiarios: <b>  {{ $det_v_d_enc_ordinario->total_beneficiarios}} </b> 
                                                @php($tipo_racion_v_d  = $det_v_d_enc_ordinario->idracion)
                                            @endif                                   
                                        @endforeach 

                                        <br>
                                        <b>Desgloce: </b>  <br>
                                        <br>   
                                        <span style="color: red;"> Datos de ración de ordinario</span> <br>     
                                        @foreach($det_escuelas_v_d_ordinario as $det_v_d_ordinario)
                                            @if($det_v_d_ordinario->escuela_id == $e->escuela_id)     
                                                @if($det_v_d_ordinario->alimento_peso != 0)                                   
                                                    <b><i class="fa-solid fa-caret-right"></i></b>  Alimento: <b>{{ $det_v_d_ordinario->alimento}} </b>Peso Ración (lbs.): <b>{{ $det_v_d_ordinario->alimento_peso}} </b>  <br>
                                                    - Libras: <b>{{ number_format( ($det_v_d_ordinario->dias*$det_v_d_ordinario->total_beneficiarios*$det_v_d_ordinario->alimento_peso), 2, '.', ',' )}}</b>  <br>
                                                    - Quintales: <b>{{ number_format( ((($det_v_d_ordinario->dias*$det_v_d_ordinario->total_beneficiarios*$det_v_d_ordinario->alimento_peso)/100)), 2, '.', ',' )}}</b>  <br>
                                                    - Unidades Racion: <b>{{ number_format( ((($det_v_d_ordinario->dias*$det_v_d_ordinario->total_beneficiarios*$det_v_d_ordinario->alimento_peso)/100)), 2, '.', ',' )}}</b>  <br>
                                                    <br>
                                                @endif
                                            @endif
                                        @endforeach
                                    @else
                                        @foreach($det_escuelas_v_d_ex_enc as $det_v_d_enc_ex)
                                            @if($det_v_d_enc_ex->escuela_id == $e->escuela_id)    
                                                Racion: <b>  {{ $det_v_d_enc_ex->racion}} </b>  &nbsp                                    
                                                Dias: <b>  {{ $det_v_d_enc_ex->dias}}</b>  &nbsp
                                                Total Beneficiarios: <b>  {{ $det_v_d_enc_ex->total_beneficiarios}} </b> 
                                                @php($tipo_racion_v_d  = $det_v_d_enc_ex->idracion)
                                            @endif                                   
                                        @endforeach 

                                        <br>
                                        <b>Desgloce: </b>  <br>
                                        <br>   
                                        <span style="color: red;"> Datos de ración de expansion</span> <br>     
                                        @foreach($det_escuelas_v_d_ex as $det_v_d_ex)
                                            @if($det_v_d_ex->escuela_id == $e->escuela_id)     
                                                @if($det_v_d_ex->alimento_peso != 0)                                   
                                                    <b><i class="fa-solid fa-caret-right"></i></b>  Alimento: <b>{{ $det_v_d_ex->alimento}} </b>Peso Ración (lbs.): <b>{{ $det_v_d_ex->alimento_peso}} </b>  <br>
                                                    - Libras: <b>{{ number_format( ($det_v_d_ex->dias*$det_v_d_ex->total_beneficiarios*$det_v_d_ex->alimento_peso), 2, '.', ',' )}}</b>  <br>
                                                    - Quintales: <b>{{ number_format( ((($det_v_d_ex->dias*$det_v_d_ex->total_beneficiarios*$det_v_d_ex->alimento_peso)/100)), 2, '.', ',' )}}</b>  <br>
                                                    - Unidades Racion: <b>{{ number_format( ((($det_v_d_ex->dias*$det_v_d_ex->total_beneficiarios*$det_v_d_ex->alimento_peso)/100)), 2, '.', ',' )}}</b>  <br>
                                                    <br>
                                                @endif
                                            @endif
                                        @endforeach
                                        
                                    @endif
                            </div>
                        </div>
                        <div class="row mtop16">
                            <span style="text-align:center; color: red; text-size:12px; font-weight: bold;">
                                Despacho de Raciones 
                            </span>
                            <div class="col-md-6">
                                {!! Form::open(['url' => '/admin/solicitud_despacho/despachar/escolar', 'files' => true]) !!}
                                    <div class="col-md-12 mtop16">
                                        <span style="text-align:center; color: blue; text-size:10px; font-weight: bold;">
                                            Despacho de Raciones Escolares
                                        </span>
                                        <br>
                                        <label class="mtop16" for="name"> <strong><sup ><i class="fa-solid fa-triangle-exclamation"></i></sup> Ingresar El Número de Boleta: </strong></label>
                                        <div class="input-group">           
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
                                            {!! Form::hidden('idEscuela', $e->escuela_id, ['class'=>'form-control']) !!}   
                                            {!! Form::hidden('idSolicitud', $solicitud, ['class'=>'form-control']) !!}   
                                            {!! Form::text('no_boleta',0, ['class'=>'form-control','required']) !!}            
                                        </div>
                                    </div>   
                                    {!! Form::submit('Despachar', ['class'=>'btn btn-success mtop16']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::open(['url' => '/admin/solicitud_despacho/despachar/lideres', 'files' => true]) !!}
                                    <div class="col-md-12 mtop16"><span style="text-align:center; color: blue; text-size:10px; font-weight: bold;">
                                            Despacho de Raciones Lideres
                                        </span>
                                        <br>
                                        <label class="mtop16" for="name"> <strong><sup ><i class="fa-solid fa-triangle-exclamation"></i></sup> Ingresar El Número de Boleta: </strong></label>
                                        <div class="input-group">           
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
                                            {!! Form::hidden('idEscuela', $e->escuela_id, ['class'=>'form-control']) !!}   
                                            {!! Form::hidden('idSolicitud', $solicitud, ['class'=>'form-control']) !!}  
                                            {!! Form::text('no_boleta',0, ['class'=>'form-control','required']) !!}            
                                        </div>
                                    </div>   
                                    {!! Form::submit('Despachar', ['class'=>'btn btn-success mtop16']) !!}
                                {!! Form::close() !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::open(['url' => '/admin/solicitud_despacho/despachar/voluntarios', 'files' => true]) !!}
                                    <div class="col-md-12 mtop16">
                                        <span style="text-align:center; color: blue; text-size:10px; font-weight: bold;">
                                            Despacho de Raciones Voluntarios
                                        </span>
                                        <br>
                                        <label class="mtop16" for="name"> <strong><sup ><i class="fa-solid fa-triangle-exclamation"></i></sup> Ingresar El Número de Boleta: </strong></label>
                                        <div class="input-group">           
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
                                            {!! Form::hidden('idEscuela', $e->escuela_id, ['class'=>'form-control']) !!}   
                                            {!! Form::hidden('idSolicitud', $solicitud, ['class'=>'form-control']) !!}  
                                            {!! Form::text('no_boleta',0, ['class'=>'form-control','required']) !!}            
                                        </div>
                                    </div>   
                                    {!! Form::submit('Despachar', ['class'=>'btn btn-success mtop16']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <br><hr>
                    @endforeach
                </div>

                <div class="card-footer clearfix">
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row mtop16">     
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title"><strong><i class="fa-solid fa-file-invoice"></i> Saldos Actuales en Bodega</strong></h2>
                    
                </div>

                <div class="card-body" style="text-align:center;  overflow-y: scroll; line-height: 1em; height:400px;">
                    @foreach($alimentos as $a)
                        <p>
                            <b><i class="fa-solid fa-caret-right"></i> Alimento: </b> {{$a->nombre}} <br>
                            <b>Saldo Actual: </b> {{$a->saldo}} {{ obtenerUnidadesMedidaInsumos(null, $a->id_unidad_medida) }}
                            
                        </p>
                        <hr>
                    @endforeach
                </div>

                <div class="card-footer clearfix">
                    
                </div>
            </div>
        </div>   

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><strong><i class="fa-solid fa-file-invoice"></i> Resumen Para Realizar Solicitud A Bodega Primaria</strong></h4>
                    
                </div>

                <div class="card-body" style="text-align:center;  overflow-y: scroll; line-height: 1em; height:400px;">
                    <div class="row">
                        <div class="col-md-12">
                            @foreach($alimentos as $a)
                                <b><i class="fa-solid fa-caret-right"></i> Alimento: </b>{{ $a->nombre }} <br>
                                @php($total_peso_ruta = 0) 
                                @foreach($det_escuelas_preprimaria as $det_preprimaria)
                                    @if($det_preprimaria->alimento_id == $a->id)                                        
                                        @php($total_peso_ruta = $total_peso_ruta + ($det_preprimaria->dias*$det_preprimaria->total_beneficiarios*$det_preprimaria->alimento_peso)  )  
                                    @endif
                                @endforeach
                                @foreach($det_escuelas_primaria as $det_primaria)
                                    @if($det_primaria->alimento_id == $a->id)                                        
                                        @php($total_peso_ruta = $total_peso_ruta + ($det_primaria->dias*$det_primaria->total_beneficiarios*$det_primaria->alimento_peso)  )  
                                    @endif
                                @endforeach
                                @foreach($det_escuelas_l as $det_l)
                                    @if($det_l->alimento_id == $a->id)                                        
                                        @php($total_peso_ruta = $total_peso_ruta + ( ($det_l->dias*$det_l->total_beneficiarios*$det_l->alimento_peso)/453.59237)  )  
                                    @endif
                                @endforeach
                                @foreach($det_escuelas_v_d as $det_v_d)
                                    @if($det_v_d->alimento_id == $a->id)                                        
                                        @php($total_peso_ruta = $total_peso_ruta + ( ($det_v_d->dias*$det_v_d->total_beneficiarios*$det_v_d->alimento_peso)/453.59237)  )  
                                    @endif
                                @endforeach

                                @if($det_escuelas_preprimaria_ex)
                                    @foreach($det_escuelas_preprimaria_ex as $det_preprimaria_ex)
                                        @if($det_preprimaria_ex->alimento_id == $a->id)                                        
                                            @php($total_peso_ruta = $total_peso_ruta + ($det_preprimaria_ex->dias*$det_preprimaria_ex->total_beneficiarios*$det_preprimaria_ex->alimento_peso)  )  
                                        @endif
                                    @endforeach
                                @endif

                                @if($det_escuelas_primaria_ex)
                                    @foreach($det_escuelas_primaria_ex as $det_primaria_ex)
                                        @if($det_primaria_ex->alimento_id == $a->id)                                        
                                            @php($total_peso_ruta = $total_peso_ruta + ($det_primaria_ex->dias*$det_primaria_ex->total_beneficiarios*$det_primaria_ex->alimento_peso)  )  
                                        @endif
                                    @endforeach
                                @endif

                                @if($det_escuelas_l_ex)
                                    @foreach($det_escuelas_l_ex as $det_l_ex)
                                        @if($det_l_ex->alimento_id == $a->id)                                        
                                            @php($total_peso_ruta = $total_peso_ruta + ($det_l_ex->dias*$det_l_ex->total_beneficiarios*$det_l_ex->alimento_peso)  )  
                                        @endif
                                    @endforeach
                                @endif

                                @if($det_escuelas_v_d_ex)
                                    @foreach($det_escuelas_v_d_ex as $det_v_d_ex)
                                        @if($det_v_d_ex->alimento_id == $a->id)                                        
                                            @php($total_peso_ruta = $total_peso_ruta + ($det_v_d_ex->dias*$det_v_d_ex->total_beneficiarios*$det_v_d_ex->alimento_peso)  )  
                                        @endif
                                    @endforeach
                                @endif

                                <b>Total Gramos: </b>{{ number_format($total_peso_ruta , 2, '.', ',' )}} &nbsp
                                <b>Total Quintales: </b>{{ number_format( (($total_peso_ruta/100)) , 2, '.', ',' )}} 
                                <b>Total Unidades: </b>{{ number_format( (($total_peso_ruta/110)) , 2, '.', ',' )}} 
                                <hr>
                            @endforeach
                        </div>
                    </div>
                    
                </div>

                <div class="card-footer clearfix">
                    
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title"><strong><i class="fa-solid fa-file-invoice"></i> Realizar Solicitud A Bodega Primaria</strong></h2>
                    
                </div>

                <div class="card-body" style="text-align:center;  overflow-y: scroll; line-height: 1em; height:400px;">

                    <div class="row">
                        <div class="col-md-12">
                            <p><b>Realizar Solicitud de Alimentos A Bodega Principal</b></p>

                            
                        
                            {!! Form::open(['url' => '/admin/solicitud_despacho/solicitud_bodega_primaria', 'files' => true]) !!}
                                {!! Form::hidden('idSolicitud', $solicitud, ['class'=>'form-control']) !!}
                                <div class="col-md-12 mtop16">
                                    <label for="name"> <strong><sup ><i class="fa-solid fa-triangle-exclamation"></i></sup> Solicitar A: </strong></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-layer-group"></i></span>
                                        {!! Form::select('id_bodega_primaria', $bodegas,0,['class'=>'form-select', 'id'=>'id_institucion', 'style' => 'width: 92%']) !!}
                                    </div>
                                </div>

                                <div class="col-md-12 mtop16">
                                    <label for="name"> <strong><sup ><i class="fa-solid fa-triangle-exclamation"></i></sup> Tipo de Ración: </strong></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-layer-group"></i></span>
                                        <select name="tipo_racion" id="tipo_racion" style="width: 92%" >
                                            @foreach($raciones as $r)
                                                <option value=""></option>
                                                <option value="{{ $r->id }}">{{ $r->tipo_alimentos }}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>

                                <div class="col-md-12 mtop16">
                                    <label for="name"> <strong><sup ><i class="fa-solid fa-triangle-exclamation"></i></sup> Insumo: </strong></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-layer-group"></i></span>
                                        <select name="idinsumo" id="idinsumo" style="width: 92%" >
                                            @foreach($alimentos as $a)
                                                <option value=""></option>
                                                <option value="{{ $a->id }}">{{ $a->nombre }}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>

                                <div class="col-md-12 mtop16">
                                    <label for="name"> <strong><sup ><i class="fa-solid fa-triangle-exclamation"></i></sup> Cantidad a Solicitar: </strong></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
                                        {!! Form::number('cantidad', null, ['class'=>'form-control', 'id' => 'cantidad']) !!}
                                    </div> 
                                </div>

                                <div class="col-md-12 mtop16">
                                    <label for="name"> <strong><sup ><i class="fa-solid fa-triangle-exclamation"></i></sup> Unidad de Medida A Solicitar: </strong></label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-keyboard"></i></span>
                                        {!! Form::select('id_unidad_medida', obtenerUnidadesMedidaInsumos('list', null), 0,['class'=>'form-select', 'id'=>'id_unidad_medida', 'style' => 'width: 92%']) !!} 
                                    </div> 
                                </div>

                                <div class="col-md-2 mtop16">
                                    <button type="button" id="bt_add" class="btn btn-primary"> Agregar</button>
                                </div>                           

                                <div class="col-md-12 mtop16">
                                    <div class="card-body table-responsive">
                                        <table id="detalles" class= "table table-striped table-bordered table-condensed table-hover">
                                            <thead style="background-color: #c3f3ea">
                                                <th>ELIMINAR</th>
                                                <th>INSUMO</th>
                                                <th>CANTIDAD</th>
                                                <th>UNIDAD DE MEDIDA</th>
                                            </thead>

                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-6" id="guardar">
                                    {!! Form::submit('Guardar', ['class'=>'btn btn-success mtop16']) !!}
                                </div>
                            </div>

                        {!! Form::close() !!}
                    </div>
                    
                </div>

                <div class="card-footer clearfix">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    


    $(document).ready(function(){
        $('#bt_add').click(function(){
        agregar();
        });
    });

    var cont=0;
    total=0;
    subtotal=[];
    $("#guardar").hide();

    function agregar(){
        idinsumo=$("#idinsumo").val();
        insumo=$("#idinsumo option:selected").text();        
        cantidad=$("#cantidad").val();
        idmedida=$("#id_unidad_medida").val();
        medida=$("#id_unidad_medida option:selected").text();

        if (idinsumo!=""   ){
            var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idinsumo[]" value="'+idinsumo+'">'+insumo+'</td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="hidden" name="idmedida[]" value="'+idmedida+'">'+medida+'</td></tr>';
            cont++;
            limpiar();
            evaluar();
            $('#detalles').append(fila);
        }else{
            alert("Error al ingresar el detalle del ingreso, revise los datos del insumo a registrar")
        }
        
    }

    function limpiar(){
        $("#cantidad").val("");
    }

    function evaluar()
    {
        if (cont >0){
            $("#guardar").show();
        }else{
            $("#guardar").hide();
        }
    }

    function eliminar(index){
        $("#fila" + index).remove();
        cont--;
        evaluar();
    }



</script>
@endsection
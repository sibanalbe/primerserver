@extends('layouts.master')

@section('contenido')
@include('layouts.show_form_errors')
<div class="container">
    <div class="row">
        <ul class="nav nav-tabs" role="tablist">
            <li>{{HTML::LinkRoute('user.edit',trans('frontend.link.user.edit'),array(Auth::user()->id))}}</li>
            <li>{{HTML::LinkRoute('user.domains.index',trans('frontend.link.domain.index'),$user->id)}}</li>                  
            <li>{{HTML::LinkRoute('user.domains.create',trans('frontend.link.domain.create'),$user->id)}}</li>                  
            <li><a href="{{URL::route('user.payments.index',$user->id)}}">{{trans('frontend.link.payment.index')}}</a></li>                  
        </ul>
    </div>
    <div class="row">
        <div class="col-xs-12">
            @if(count($domains))
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>{{trans('frontend.table_head.domain.domain')}}</th>
                        <th>{{trans('frontend.table_head.domain.active')}}</th>                                            
                        <th>{{trans('frontend.table_head.domain.plan')}}</th>                                                
                        <th>{{trans('frontend.table_head.domain.activate')}}</th>
                        
                    </tr>
                    @foreach($domains as $domain)
                    <tr>                              
                        <td>{{ HTML::linkRoute('user.domains.show',$domain->domain,array($user->id,$domain->id)) }}</td>
                        <!-- podriamos utilizar iconos -->
                        <td>{{ ($domain->active)?"si":"no"}}</td>                                                            
                        <td>{{ $domain->plan->plan_name}}</td>
                        @if(!$domain->active && $domain->plan->plan_name != "free")
                        <td>
                            {{ HTML::LinkRoute('user.payments.index',trans('frontend.button.domain.activate.submit'),$user->id,array("class"=>'btn btn-success'))}}                            
                        </td>
                        @else
                        <td></td>
                        @endif

                    </tr>                    
                    @endforeach
                </table>

                {{ $domains->links(); }}

            </div>
            @else
            <h1>{{trans('frontend.messages.no_domains')}}</h1>
            @endif
        </div>
    </div>
</div>
@stop
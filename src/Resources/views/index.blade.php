@extends('shop::layouts.master')

@section('page_title')
{{ __('Zoop Payment') }}
@endsection

@section('content-wrapper')
    <div class="auth-content form-container">
        <div class="container">
            <div class="col-lg-10 col-md-12 offset-lg-1">
                <div class="heading">
                    <h2 class="fs24 fw6">
                        {{ __('Finish Payment')}}
                    </h2>
                </div>

                <div class="body col-12">
                    <h3 class="fw6">
                        {{ __('Credit Card Information')}}
                    </h3>

                    <form
                        method="post"
                        action="{{ route('zoop.pay') }}"
                        @submit.prevent="onSubmit">

                        {{ csrf_field() }}

                        <div class="control-group" >
                            <label for="holder">{{ __('Holder') }}</label>
                            <input type="text" class="form-style" name="holder" id="holder" value="{{ $user->name }}" v-validate="'required'">
                            <span class="control-error" v-if="errors.has('holder')">@{{ errors.first('holder') }}</span>
                        </div>
                        <div class="control-group">
                            <label for="number">{{ __('Number') }}</label>
                            <input type="text" class="form-style" name="number" id="number" value="" v-validate="'required'" >
                            <span class="control-error" v-if="errors.has('number')">@{{ errors.first('number') }}</span>
                        </div>
                        <div class="control-group" style="display: flex;" :class="[errors.has('month') ? 'has-error' : '']">
                            <div style="width: 50%; padding-right: 0.5rem;">
                                <label for="month">{{ __('Month') }}</label>
                                <input type="text" class="form-style" name="month" id="month" value="" v-validate="'required'" >
                                <span class="control-error" v-if="errors.has('month')">@{{ errors.first('month') }}</span>
                            </div>
                            <div style="width: 50%; padding-left: 0.5rem;">
                                <label for="year">{{ __('Year') }}</label>
                                <input type="text" class="form-style" name="year" id="year" value="" v-validate="'required'" >
                                <span class="control-error" v-if="errors.has('year')">@{{ errors.first('year') }}</span>
                            </div>
                        </div>
                        <div class="control-group" :class="[errors.has('cvc') ? 'has-error' : '']">
                            <label for="cvc">{{ __('CVC') }}</label>
                            <input type="text" class="form-style" name="cvc" id="cvc" value="" v-validate="'required'" >
                            <span class="control-error" v-if="errors.has('cvc')">@{{ errors.first('cvc') }}</span>
                        </div>
                        <div class="button-group">
                            <button type="submit" class="theme-btn btn-primary">
                                {{ __('Pay') }}
                            </button>
                        </div>
                            <div class="button-group" style="margin-bottom: 0px;">
                                <a href="{{ route('zoop.cancel') }}">
                                    <i class="icon primary-back-icon"></i>
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                            <small class="text-secondary text-center">Pagamento processado através da Zoop.</small>
                            <input type="hidden" class="form-control" name="brand" id="brand" placeholder="" required="">
                        </div>
                    </div>
                </form>
            </div>
@endsection

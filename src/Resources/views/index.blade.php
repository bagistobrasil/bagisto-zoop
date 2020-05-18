@extends('shop::layouts.master')

@section('page_title')
    {{ __('Zoop Payment') }}
@stop


@push('css')
    <style>
        .button-group {
            margin-bottom: 10px;
            margin-top: 10px;
        }
        .primary-back-icon {
            vertical-align: middle;
        }
    </style>
@endpush

@section('content-wrapper')


<div class="auth-content" style="padding-top:0px;">

    <form method="post" action="{{ route('zoop.pay') }}" @submit.prevent="onSubmit">

        {{ csrf_field() }}

        <div class="login-form">

            <div class="login-text">{{ __('Credit card') }}</div>

            <div class="control-group" >
                <label for="holder">{{ __('Holder') }}</label>
                <input type="text" class="control" name="holder" id="holder" value="{{ $user->name }}" v-validate="'required'">
                <span class="control-error" v-if="errors.has('holder')">@{{ errors.first('holder') }}</span>
            </div>

            <div class="control-group" >
                <label for="number">{{ __('Number') }}</label>
                <input type="text" class="control" name="number" id="number" value="" v-validate="'required'" >
                <span class="control-error" v-if="errors.has('number')">@{{ errors.first('number') }}</span>
            </div>

            <div class="control-group" style="display: flex;" :class="[errors.has('month') ? 'has-error' : '']">
                <div style="width: 50%; padding-right: 0.5rem;">
                    <label for="month">{{ __('Month') }}</label>
                    <input type="text" class="control" name="month" id="month" value="" v-validate="'required'" >
                    <span class="control-error" v-if="errors.has('month')">@{{ errors.first('month') }}</span>
                </div>
                <div style="width: 50%; padding-left: 0.5rem;">
                    <label for="year">{{ __('Year') }}</label>
                    <input type="text" class="control" name="year" id="year" value="" v-validate="'required'" >
                    <span class="control-error" v-if="errors.has('year')">@{{ errors.first('year') }}</span>
                </div>

            </div>

            <div class="control-group" :class="[errors.has('cvc') ? 'has-error' : '']">
                <label for="cvc">{{ __('CVC') }}</label>
                <input type="text" class="control" name="cvc" id="cvc" value="" v-validate="'required'" >
                <span class="control-error" v-if="errors.has('cvc')">@{{ errors.first('cvc') }}</span>
            </div>

            <div class="button-group">
                <button type="submit" class="btn btn-lg btn-primary">
                    {{ __('Pay') }}
                </button>
            </div>


                <div class="control-group" :class="[errors.has('hash') ? 'has-error' : '']">
                    <input type="hidden" class="control" name="hash" id="hash" value="" v-validate="'required'">

                    <b><span class="control-error" v-if="errors.has('hash')">Confira os dados do cartão de crédito e tente novamente.</span></b>
                </div>

                <div class="control-group" style="margin-bottom: 0px;">
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



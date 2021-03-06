<?php
$zoopRepository = app('LevanteLab\Zoop\Repositories\ZoopRepository');
$status = $zoopRepository->findWhere(['order_id' => $order->id]);
$reference = $zoopRepository->getReference($order->id);
//$status = $wirecardRepository->where(['order_id' => $order->id])->orderBy('created_at', 'DESC');
//$status = $wirecardRepository->all();
?>

@if($order->payment->method == "zoop")
    <div class="row">
        <span class="title">
            {{ __('Zoop payment status') }}
        </span>

        <span class="value" style="display: inline-grid;">
            @foreach ($status as $i)
                @if($i->status == "CREATED")
                    <div style="margin-bottom: 0.6rem;">
                        <span class="badge badge-md badge-warning" style="font-size: 13px; margin-right: 0.5rem;">Criado</span>
                        <small><span>{{ $i->created_at }}</span></small>
                    </div>
                @elseif($i->status == "WAITING")
                    <div style="margin-bottom: 0.6rem;">
                        <span class="badge badge-md badge-warning" style="font-size: 13px; margin-right: 0.5rem;">Aguardando</span>
                        <small><span>{{ $i->created_at }}</span></small>
                    </div>
                @elseif($i->status == "IN_ANALYSIS")
                    <div style="margin-bottom: 0.6rem;">
                        <span class="badge badge-md badge-warning" style="font-size: 13px; margin-right: 0.5rem;">Em análise</span>
                        <small><span>{{ $i->created_at }}</span></small>
                    </div>
                @elseif($i->status == "PRE_AUTHORIZED")
                    <div style="margin-bottom: 0.6rem;">
                        <span class="badge badge-md badge-warning" style="font-size: 13px; margin-right: 0.5rem;">Pré autorizado</span>
                        <small><span>{{ $i->created_at }}</span></small>
                    </div>
                @elseif($i->status == "AUTHORIZED")
                    <div style="margin-bottom: 0.6rem;">
                        <span class="badge badge-md badge-success" style="font-size: 13px; margin-right: 0.5rem;">Autorizado</span>
                        <small><span>{{ $i->created_at }}</span></small>
                    </div>
                @elseif($i->status == "CANCELLED")
                    <div style="margin-bottom: 0.6rem;">
                        <span class="badge badge-md badge-danger" style="font-size: 13px; margin-right: 0.5rem;">Cancelado</span>
                        <small><span>{{ $i->created_at }}</span></small>
                    </div>
                @elseif($i->status == "REFUNDED")
                    <div style="margin-bottom: 0.6rem;">
                        <span class="badge badge-md badge-info" style="font-size: 13px; margin-right: 0.5rem;">Reembolsado </span>
                        <small><span>{{ $i->created_at }}</span></small>
                    </div>
                @elseif($i->status == "REVERSED")
                    <div style="margin-bottom: 0.6rem;">
                        <span class="badge badge-md badge-info" style="font-size: 13px; margin-right: 0.5rem;">Estornado</span>
                        <small><span>{{ $i->created_at }}</span></small>
                    </div>
                @elseif($i->status == "SETTLED")
                    <div style="margin-bottom: 0.6rem;">
                        <span class="badge badge-md badge-info" style="font-size: 13px; margin-right: 0.5rem;">Concluído</span>
                        <small><span>{{ $i->created_at }}</span></small>
                    </div>
                @endif

            @endforeach
        </span>
    </div>
    <div class="row">
        <span class="title">
            {{ __('Wirecard reference') }}
        </span>
        <span class="value">
                @if($reference)
                    {{ $reference }}
                @endif
        </span>
    </div>
@endif

@push('scripts')
<script>
    $(document).ready(function() {
        $('.badge').css('margin-button','10px');
    });
</script>
@endpush
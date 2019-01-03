@extends('admin.layout')
@section('title', 'Tổng kết kết quả')
@section('content')
    <h3>Tổng kết kết quả</h3>
    <div class="form-group btn-submit">
        <button style type="button" class="btn btn-primary" id="btn-sum" name = "btn-sum">Tổng kết</button>
    </div>
    <h4 id="title-list"></h4>
    <p style="font-size: 16px;  color: green;" id="note"></p><br>
    <div id="data-sum"></div>
@endsection
@section('scripts')
    <script src="../js/admin/sum.js"></script>
@endsection

                
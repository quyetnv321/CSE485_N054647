@extends('admin.layout')
@section('title', 'Tải câu hỏi')
@section('content')
    <h3>Upload câu hỏi</h3>
    @if(!empty($errors->first()))
        <p id="up-success">{{ $errors->first() }}</p>
    @endif
    <form method="post" enctype="multipart/form-data" action="{{ route('upQuestion.admin') }}">
        <input type ="hidden" name="_token" value="{{@csrf_token()}}">
        <div class="form-group">
            <label for="exampleInputPassword1">Câu hỏi</label>
            <textarea type="text" id="txtarea-noidung" class="form-control"  placeholder="Nội dung câu hỏi" name = "thread" required></textarea>
        </div>
        <p for="exampleFormControlSelect1">Câu trả lời</p>
        <div class="form-group col-md-6 col-xs-12 tl">
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Đáp án A" name="answerA" required="">
        </div>
        <div class="form-group col-md-6 col-xs-12 tl">
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Đáp án B" name="answerB" required="">
        </div>
        <div class="form-group col-md-6 col-xs-12 tl">
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Đáp án C" name="answerC" required="">
        </div>
        <div class="form-group col-md-6 col-xs-12 tl">
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Đáp án D" name="answerD" required="">
        </div>
        <div class="form-group col-md-6 col-xs-12 tl">
            <label for="exampleFormControlSelect1">Thời gian</label>
            <input type="text" class="form-control" id="exampleInputPassword1" style="margin: 0;" placeholder="15s" name="time-question" required="" disabled>
        </div>
        <div class="form-group col-md-6 col-xs-12 tl">
            <label for="exampleFormControlSelect1">Level câu hỏi</label>
            <select class="form-control" id="exampleFormControlSelect1" name = "level" required>
                <option value = "">Chọn</option>
                <option value = "1">Level 1</option>
                <option value = "2">Level 2</option>
            </select>      
        </div>
        <div class="form-group col-md-12 col-xs-12 tl">
            <label for="exampleFormControlSelect1">Đáp án đúng</label>
            <select class="form-control" id="exampleFormControlSelect1" name = "rightAnswer" required>
                <option value = "">Chọn</option>
                <option value = "1">Đáp án A</option>
                <option value = "2">Đáp án B</option>
                <option value = "3">Đáp án C</option>
                <option value = "4">Đáp án D</option>
            </select>      
        </div>
        <div class="form-group btn-submit">
                <button type="submit" class="btn btn-primary" name = "up">Upload</button>
        </div>  
    </form>
@endsection
@section('scripts')

@endsection
                
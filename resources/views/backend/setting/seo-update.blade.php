@extends('admin.admin_master')
@section('admin')
@section('title')
Shopping Room Admin - Seo Setting
@endsection

<div class="container-full">
    <section class="content">
        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Seo Setting</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('update.seosetting') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{$seo->id}}">

                            <div class="row">

                                <div class="col-8">
                                    <div class="row">
                                        <div class="form-group">
                                            <h5>Meta Title</h5>
                                            <div class="controls">
                                                <input type="text" name="meta_title" class="form-control" value="{{$seo->meta_title}}">
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <h5>Meta Author</h5>
                                            <div class="controls">
                                                <input type="text" name="meta_author" class="form-control" value="{{$seo->meta_author}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Meta Keyword</h5>
                                            <div class="controls">
                                                <input type="text" name="meta_keyword" class="form-control" value="{{$seo->meta_keyword}}">
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <h5>Meta Description</h5>
                                            <div class="controls">
                                                <textarea name="meta_description" class="form-control" id="" cols="10" rows="5">{{$seo->meta_description}}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>Google Analytics</h5>
                                            <div class="controls">
                                                <textarea name="google_analytics" class="form-control" id="" cols="10" rows="5">{{$seo->google_analytics}}</textarea>
                                            </div>

                                        </div>
                                    
                                    </div>
                                    <!-- end row -->

                                </div>
                                <!-- en col-12 -->
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-info" value="Update" />
                            </div>
                        </form>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
</div>


@endsection
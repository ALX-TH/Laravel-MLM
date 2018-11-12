@extends('layouts.admin')

@section('title', 'Create New Blog Post')

@section('styles')


@endsection


@section('content')

    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="purple">
                    <i class="material-icons">face</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Blog Section -
                        <small class="category">Create New Post</small>
                    </h4>
                    <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">

                        {{csrf_field()}}

                        @if(count($errors) > 0)
                            <div class="alert alert-danger alert-with-icon" data-notify="container">
                                <i class="material-icons" data-notify="icon">notifications</i>
                                <span data-notify="message">

                                    @foreach($errors->all() as $error)
                                        <li><strong> {{$error}} </strong></li>
                                    @endforeach

                            </span>
                            </div>
                        @endif


                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label  class="control-label" for="title">Post Title</label>
                                <input id="title" name="title" type="text" class="form-control">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{asset('img/image_placeholder.jpg')}}" alt="...">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                <div>
                                                    <span class="btn btn-rose btn-round btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                      <input type="file" name="featured" />
                                                    </span>
                                    <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <select class="selectpicker" name="category_id" data-style="btn btn-warning btn-round" title="Select Category" data-size="7">
                                            @foreach($categories as $category)

                                                <option value="{{$category->id}}"> {{$category->name}} </option>

                                            @endforeach

                                        </select>
                                    </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="category" data-style="btn btn-warning btn-round" multiple title="Select Category" data-size="7">
                                        @foreach($tags as $tag)

                                            <option value="{{$tag->id}}"> {{$tag->tag}} </option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                    <br>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label  class="control-label" for="content">Post Content</label>
                                <textarea class="form-control" name="body" id="content" rows="10"></textarea>
                            </div>
                        </div>
                    </div>

                    <a href="{{route('admin.posts.index')}}" class="btn btn-rose">Cancel Post</a>

                        <button type="submit" class="btn btn-success pull-right">Create Post</button>

                    <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/tinymce_jq/tinymce.min.js')}}"></script>
    <script type="text/javascript">
        $(function(){
            tinyMCE.init({

                selector: "textarea#body, textarea#content",
                height: '300',
                plugins: [
                    "advlist autolink lists link image preview anchor responsivefilemanager",
                    "hr visualchars autosave noneditable searchreplace wordcount visualblocks",
                    "code fullscreen save textcolor colorpicker charmap nonbreaking",
                    "insertdatetime media table contextmenu paste imagetools"
                ],
                toolbar_items_size : 'small',
                menubar:'file edit insert view format table tools',
                toolbar1: "restoredraft save fontselect formatselect fontsizeselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | forecolor backcolor | table | link unlink anchor media image | fullscreen visualblocks visualchars code",
                statusbar: true,
                font_formats: "Andale Mono=andale mono,times;"+
                "Arial=arial,helvetica,sans-serif;"+
                "Arial Black=arial black,avant garde;"+
                "Book Antiqua=book antiqua,palatino;"+
                "Comic Sans MS=comic sans ms,sans-serif;"+
                "Courier New=courier new,courier;"+
                "Georgia=georgia,palatino;"+
                "Helvetica=helvetica;"+
                "Impact=impact,chicago;"+
                "Symbol=symbol;"+
                "Tahoma=tahoma,arial,helvetica,sans-serif;"+
                "Terminal=terminal,monaco;"+
                "Times New Roman=times new roman,times;"+
                "Trebuchet MS=trebuchet ms,geneva;"+
                "Verdana=verdana,geneva;"+
                "Webdings=webdings;"+
                "Wingdings=wingdings,zapf dingbats",
                image_advtab: true,
                external_filemanager_path:"{{asset('js/filemanager/')}}/",
                filemanager_title:"FileManager" ,
                external_plugins: {
                    "filemanager" : "{{asset('js/filemanager/plugin.min.js')}}"
                },
                base_directory: "../uploads",
                save_enablewhendirty: true,
                save_title: "save",
                theme_advanced_buttons3_add : "save",
                save_onsavecallback: function() {
                    $("[type='submit']").trigger("click");
                },
                language: '{{ app()->getLocale() }}',
            });
        });
    </script>

@endsection
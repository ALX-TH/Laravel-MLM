@extends('layouts.admin')

@section('title', 'Send Email To User or Outsider')

@section('content')

    <div class="row">
        <div class="col-md-9 col-md-offset-1">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">email</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Send Email Section -
                        <small class="category">Send Email to Your Website User and Receive Email From Outsider</small>
                    </h4>

                    <div class="alert alert-info">
                        <p class="text-center">
                            This message box supported HTML Tag & Markdown Content. For more details click : <br>
                            <a href="https://summernote.org/" target="_blank">HTML Editor</a>  <br>
                            <a href="https://dillinger.io/" target="_blank">Markdown Editor</a>  <br>
                        </p>
                    </div>

                    <form action="{{route('adminEmail.send')}}" role="form" id="contact-form"  method="POST">
                        {{csrf_field()}}
                        <div class="card-content">
                            @if(count($errors) > 0)
                                <div class="alert alert-danger alert-with-icon" data-notify="container">
                                    <i class="material-icons" data-notify="icon">notifications</i>
                                    <span data-notify="message">
                                                        @foreach($errors->all() as $error)
                                            <li><strong> {{$error}} </strong></li>
                                        @endforeach
                                                    </span>
                                </div>
                                <br>
                            @endif
                            <div class="row">
                                <div class="form-group label-floating">
                                    <select class="selectpicker" name="status" data-style="btn btn-success btn-round" title="Select Email Receiver Status" data-size="7">
                                        <option value="1">Our User</option>
                                        <option value="2">Outsider</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group label-floating">
                                <label for="email" class="control-label">Send To</label>
                                <input type="email" id="email" name="email" class="form-control">
                            </div>
                            <br>

                            <div class="form-group label-floating">
                                <label for="subject" class="control-label">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control">
                            </div>
                            <br>
                            <div class="form-group label-floating">
                                <label for="message" class="control-label">Your message</label>
                                <textarea name="body" class="form-control" id="message" rows="10"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-7">
                                    <button type="submit" class="btn btn-primary pull-right">Send Message</button>
                                </div>
                            </div>
                        </div>

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

                selector: "textarea#body, textarea#content, textarea#message",
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
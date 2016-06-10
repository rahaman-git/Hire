@extends('app')

<link rel="stylesheet" href="{{ url('/css/bootstrap-material-design.css') }}" >

@section('content')
    <style>
        h1,h2,h3,h4,h5{
            margin: 0;
        }
        .user-wrapper {
            margin-top: 80px;
            position: relative;
        }
        .user-wrapper .btn{
            margin: 5px 5px 10px 5px;
        }
        #img-form{
            margin-top: 5px;
        }
        .dzform{
            height:180px;
            width: 200px;
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            opacity: 0;
        }
        #img-form:hover .dzform{
            visibility: visible;
            opacity: 1;
        }
        .btn{
            background-color: white;
            bottom: 15px;
        }
        .hire-btn{
            margin-bottom: 0;
            padding-bottom: 0;
            background-color: black;
        }
        .col-md-3{
            padding-right: 30px;
        }
        .col-md-9{
            padding-left: 20px;
        }
        .summary-field{
        }
        .summary-form{
        }
        #summary_txt{
            width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
            padding: 20px;
        }
        .summary-edit-btn{
            right: 80px;
        }
        .wf{
            margin-bottom: 20px;
            position: relative;
        }
        .choose-field{
            display: none;
            margin: 0;
            position: relative;
        }
        .choose-field .panel-heading{
            width: 500px;
            border-radius: 5px;
            border: 1px solid lightgray;
            background-color: lightgray;
        }
        .btn-done-field{
            position: absolute;
            left: 410px;
            top: 1px;
            height: 31px;
        }
        .wf #add_fields{
            border-radius: 5px;
            border: 1px solid lightgray;
            width: 500px;
            height: auto;
            padding-bottom: 10px;
        }
        .wf .btn-fa{
            position: absolute;
            right: 70px;
            height: 35px;
            top: 0;
        }
        .field-btns{
            margin: 30px 0 0 0;
            padding: 0;
            width: 60%;
            top: 0;
        }
        .wf .btn-f{
            clear: both;
            display: block;
            text-align: left;
        }
        .exp{
            clear: both;
            position: relative;
            margin-top: 0;
        }
        .experience{
            border: 1px solid lightgray;
            border-radius: 5px;
        }
        .experience .btn{
            display: inline-block;
            bottom: 12px;
        }
        .btn-add-exp{
            position: absolute;
            right: 20px;
            top: 0;
            height: 36px;
        }
        .modal-body textarea{
            height: 60px;
        }
    </style>
    <script type="text/javascript">
        var freelancer_id = "{{ $freelancer->id }}";
        var fUrl = baseUrl + '/freelancers/' +freelancer_id;
    </script>

    <div class="row">
        <div class="col-md-3 col-sm-3">
            <div class="user-wrapper">
                @if($freelancer->profile->image_path == null)
                    <div id="img-form">
                        <img src="{{ url('/freelancer/images/thumbs/noImage.png') }}">
                        <form action="{{ url('/upload') }}" method="post" class="dropzone dzform" id="addImages">
                            {{ csrf_field() }}
                            <input type="hidden" name="freelancer_id" value="{{ $freelancer->id }}" />
                        </form>
                    </div>
                @else
                    <div id="f-img">
                        <a id="a-img" href="{{ url($freelancer->profile->image_path) }}" data-lightbox="mygallery">
                            <img src="{{ url('/freelancer/images/thumbs/'. $freelancer->profile->image_name) }}"></a>
                    </div>
                @endif
                <br>
                <h3><i>{{ $freelancer->name }}</i></h3>
                <br>
                <h4><i><strong>Php developer</strong></i></h4>
                <br>
                <br>
                <a href="#" class="btn btn-danger btn-sm hire-btn"><strong>&nbsp;
                    Hire {{ $freelancer->name }}</strong></a>
                <hr>
                <a href="#" class="btn btn-danger btn-sm"> <i class="fa fa-user-plus" ></i> &nbsp;Profile</a>
                <a href="#" class="btn btn-danger btn-sm"> <i class="fa fa-user-plus" ></i> &nbsp;Working Fields</a>
                <a href="#" class="btn btn-danger btn-sm"> <i class="fa fa-user-plus" ></i> &nbsp;Experience</a>
                <hr>
            </div>
        </div>

        <div class="col-md-9 col-sm-9  user-wrapper">
            <div class="description">
                    <div class="summary-field" style="{{ $displayForm }}" >
                        <h3 id="summary"> Summary :<a href="#" class="btn btn-danger pull-right summary-edit-btn">&nbsp;
                                Edit </a></h3>
                        <hr />
                        <p class="summary-p">
                            {{ $freelancer->profile->description }}<br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Aliquam suscipit egestas eros, ut maximus magna blandit ut.
                            Suspendisse vel molestie sapien.
                            Interdum et malesuada fames ac ante ipsum primis in faucibus.
                            Fusce sit amet egestas dui, vitae tincidunt justo.
                            Etiam eleifend massa congue magna pretium, id blandit dui pulvinar.
                            Nam et pulvinar risus, vel blandit risus.
                            Maecenas tristique volutpat ante, aliquet hendrerit felis aliquet nec.
                            Curabitur rutrum tincidunt erat, ac feugiat libero gravida ac.
                            Suspendisse ut varius quam, vitae rutrum metus.
                        </p>
                    </div>
                    <div class="summary-form" style="{{ $displayField }}">
                        <h3 id="summary"> Summary :</h3>
                        <hr>
                        <p style="text-align: center">
                            Adding a summary is a quick and easy way to highlight your experience and interests.
                        </p>
                        <form action="" method="post" id="summary_form">
                            {{csrf_field()}}
                            <textarea name="summary_txt" id="summary_txt" rows="7" ></textarea>
                            <input type="hidden" id="freelancer_id" value="{{ $freelancer->id }}">
                        </form>
                        <a href="#" class="btn btn-danger btn-block summary-add-btn">&nbsp; Add a Summary </a>
                        <br>
                    </div>
                <br>

                <div class="wf">
                    <h3> Working Fields :</h3>
                    <hr>

                    <div class="field-btns">
                    @if( count($freelancer->fields) == 0 )
                        <p>No Working field is added in fields lists</p>
                    @else
                        @foreach($freelancer->fields as $key => $field)
                            <span class="btn btn-danger btn-sm btn-f" style="width: {{ 400-$key*40 }}px">
                                &nbsp;{{ $field->name }}</span>
                        @endforeach
                    @endif
                    </div>
                    <br>
                    <div class="choose-field">
                        <h4 class="panel-heading">Choose Fields</h4><span class="btn btn-danger btn-done-field">
                            &nbsp;Done</span>
                        <select id="add_fields" class="form-control panel-body" multiple="multiple" name="field_list[]">
                            @foreach($fields as $field)
                                <option value="{{ $field->id }}"
                                    @foreach($freelancer->fields as $item)
                                        @if($field->id == $item->id)
                                            selected="selected"
                                        @endif
                                    @endforeach>
                                {{$field->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <span class="btn btn-danger pull-left btn-fa">&nbsp;Update List</span>
                </div>

                <div class="exp">
                    <h3> Experience :</h3>
                    <span class="btn btn-danger pull-right btn-add-exp">&nbsp;Add a new Experience </span>
                    <hr />
                    <div class="all-exp">
                    @foreach($freelancer->experiences as $exp)
                    <div class="experience panel" id="exp{{ $exp->id }}">
                        <p class="panel-heading">
                            {{ $exp -> title }}
                            <button href="" class="btn btn-danger pull-right exp-edit" value="{{ $exp->id }}">&nbsp;Edit</button>
                        </p>
                        <p class="panel-body">
                            {{ $exp->description }}
                        </p>
                    </div>
                    @endforeach
                    </div>
                    <br>
                </div>
                <h3> Social Links: </h3>
                <hr />
                <a href="#" class="btn btn-danger">
                <i class="fa fa-facebook"></i>&nbsp; Facebook </a>

                <a href="#" class="btn btn-danger">
                <i class="fa fa-google-plus"></i>&nbsp; Google</a>

                <a href="#" class="btn btn-danger">
                <i class="fa fa-twitter"></i>&nbsp; Twitter </a>

                <a href="#" class="btn btn-danger">
                <i class="fa fa-linkedin"></i>&nbsp; Linkedin </a>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add an Experience</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmExp" name="frmExp" class="form-horizontal" novalidate="">

                            <div class="form-group error">
                                <label for="inputTitle" class="col-sm-3 control-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control has-error" id="expTitle" name="expTitle"
                                           placeholder="Title of your Experience" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="description" name="description"
                                           placeholder="Short Description about your experience"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                        <button type="button" class="btn btn-primary" id="exp-delete" value="add">Delete</button>
                        <input type="hidden" id="freelancer_id_exp" value="{{ $freelancer->id }}">
                        <input type="hidden" id="exp-id" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $('#add_fields').select2();
    </script>
@endsection
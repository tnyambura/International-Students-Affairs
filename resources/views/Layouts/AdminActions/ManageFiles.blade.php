@extends('Layouts.AdminActions.adminMaster',['title'=>'Manage Files','newVisaReq'=>$newVisaReq,'BdCountReq'=>$BdCountReq])
@section('content')
    <nav class="d-flex align-items-center top-title-sticky" style='position:sticky; top:0; z-index:2999; padding:8px; background:#fff; width:100%; height: 56px;'>
        <span>Manage Files</span>
    </nav>

    @if(Session::has('New_User_Added'))
    <div class="alert alert-success" role="alert">
    {{Session::get('New_User_Added')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(Session::has('file_drop_success'))
    <div class="alert alert-success" role="alert">
    {{Session::get('file_drop_success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(Session::has('file_drop_error'))
    <div class="alert alert-danger" role="alert">
    {{Session::get('file_drop_error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(Session::has('file_saved'))
    <div class="alert alert-success" role="alert">
    {{Session::get('file_saved')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if(Session::has('file__error'))
    <div class="alert alert-danger" role="alert">
    {{Session::get('file__error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <ul>
            <li><i class="glyphicon glyphicon-warning-sign mx-3"></i><span>All the files must be of type PDF and must have maximum size of 2MB </span></li>
            <li><i class="glyphicon glyphicon-warning-sign mx-3"></i><span>All empty file input will be ignored! </span></li>
        </ul>
    </div>
    <x-auth-validation-errors class="breadcrumb py-0 mb-4 d-flex align-items-center" style="color:#fff; background:#113C7A;" :errors="$errors" />

    <div class="container-fluid buddy-contents active" id="buddies_list"><br/>
        <div class="card mb-4 border-none">
            @if(false)
                <span style='margin:auto; font-size:40px; color: rgba(17, 60, 122,.3);'>Page not available!</span>
            @else
            <div class="card-header d-flex" style='overflow:auto'>
                <div role='button' class='append-new-guide d-flex align-items-center'><i class="material-icons  mr-2" style='color:var(--success)'>add</i> Add a file</div>
            </div>
            <div class="card-body" style='overflow:auto'>

                        <form action='{{route("add.FileInsert")}}' class='file-form-new' method='post' enctype="multipart/form-data"> @csrf
                            <input class='new-file-btn btn mt-1 mb-5 d-none' style='margin-inline:auto; overflow:hidden; border: 1px solid #113C7A; color:#113C7A; text-transform: capitalize;' type='submit' value='Add files'/>
                        </form>

                        <div class="breadcrumb mb-4 d-flex  align-items-center" style="background:#113C7A;">
                            <span class="breadcrumb-item active" style="color:white;">All saved files </span>
                        </div>
                
                    @if($Guides)
                        <!-- <form class='file-form' action='{{route("add.FileUpdate")}}' method="post" enctype="multipart/form-data"> @csrf -->
                            @foreach($Guides as $v)
                            @php $fileName = explode('.',$v['file_name']); @endphp
                                <div class='file-item-li my-2'>
                                    <a class=' d-flex align-items-center' href="/downloadGuides/{{Crypt::encrypt($v['file_name'])}}"><i class='fa fa-file-pdf mr-2' style='font-size: 40px; color:var(--danger); height: 50px;'></i></a>
                                    <span class=' m-0 pl-2' style='padding-block: 12.5px; outline:none; border:none; border-bottom: 2px solid rgb(17,60,122,.3); border-top: 2px solid rgb(17,60,122,.3); font-size:15px; color: rgb(17,60,122,.3); align-self:center;'>{{explode(".",$v["file_name"])[0]}}</span>
                                    <div class=' rmv-btn d-flex'>
                                        <a class='d-flex align-items-center remove-file' data-file-name='{{explode(".",$v["file_name"])[0]}}' href="/remove-guide/{{$v['id']}}/{{Crypt::encryptString($v['file_name'])}}"><i class='fa fa-trash' style='font-size: 20px;'></i></a>
                                    </div>
                                </div>
                            @endforeach 
                            <!-- <button class='update-files-btn btn mt-4 position-relative rounded' type='submit' style='overflow:hidden; border: 1px solid #113C7A; color:#113C7A; text-transform: capitalize;'>
                                <span >Save Files</span>
                            </button>
                        </form> -->
                    @else
                    <p style='text-align:center; padding-block:10px; font-size: 20px; letter-spacing: 2px; color:rgba(110,110,110,.4); '>No File uploaded</p>
                    @endif
                    
            </div>
            @endif
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script defer>
        
        $(document).ready(function() {
            $(".update-files-btn").on("click", function(e){
                // e.preventDefault()
                // $(this).prop('disabled',true)
                // $(this).find('>div').css('background','#fff')
                // $(this).find('>div').removeClass('d-none')
                // $(this).find('>div').addClass('d-flex')
            })
            
            $(".append-new-guide").on("click", function(e){
                let form = $(this).parent().siblings('.card-body').find('.file-form-new')
                let subBtn = form.find('input[type=submit]')
                let randId = Math.random()*100;
                let fileInput = `<div class='row my-2 align-item-center form-outline flex-nowrap'>
                                <a class='col-1 d-flex align-items-center' href=""><i class='fa fa-file-pdf mr-2' style='font-size: 40px; color:var(--danger); height: 50px;'></i></a>
                                <input class='col-lg mr-3' name='file_name[]' type='text' style='outline:none; border:none; font-size:15px; color: #113C7A; align-self:center;' required placeholder='Enter File label...' />
                                <div class='col-3 d-flex'>
                                    <label class='btn label-file-change' for='choose_file_${randId}'>
                                        <span style='font-size:12px;'>Choose File</span>
                                        <input onchange='FileChanged(event)' class='choose_file' accept=".pdf" name='file_data[]' id='choose_file_${randId}' type='file' style='display: none; font-size:12px; color: #113C7A; align-self:center;'/>
                                    </label>
                                    <small class="text-red-500 text-xs">@error('file_data') {{$message}} @enderror</small>
                                    <div class='remove-added-file' onclick='RemoveElement(event)' role='button'><i class=' fa fa-trash mx-2 px-2' style='font-size: 40px; color:var(--danger);'></i></div>
                                </div></div>`
                form.prepend(fileInput);
                (subBtn.hasClass('d-none'))?subBtn.removeClass('d-none'):false;
            })
            $(".remove-file").on("click", function(e){
                e.preventDefault()
                let filename = $(this).attr('data-file-name')

                if(confirm(`Do you really want to remove the file ${filename} ?`)){
                    $('body').find('.loader-load-container').removeClass('d-none')
                    $('body').find('.loader-load-container').addClass('d-flex')
                    location.href=$(this).attr('href')
                }
            })
            $('.showBuddyChangeBtn').on('click',function(e){
                if($(this).parent().hasClass('hide')){
                    $(this).parent().removeClass('hide')
                    $(this).parent().css('left','0%').slow()
                }else{
                    $(this).parent().addClass('hide')
                    $(this).parent().css('left','88%').slow()
                }
            })
            
            $('body').find('.select_new_buddy').on('change',function(e){
                if($(this).val() !== ""){
                    $(this).parent().parent().siblings('.sbmt-btn').find('#allocate_a_buddy_btn').attr('disabled',false)
                }
            })
            $('body').find('.tab-link').on('click',function(e){
                $(this).siblings().removeClass('active')
                $(this).addClass('active')
                $('body').find($(this).attr('data-load-target')).siblings('.container-fluid').removeClass('active')
                $('body').find($(this).attr('data-load-target')).addClass('active')
                
            })

        })
    </script>
           
@endsection
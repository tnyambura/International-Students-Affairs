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

    <div class="container-fluid buddy-contents active" id="buddies_list"><br/>
        <div class="card mb-4 border-none">
            <div class="card-header d-flex" style='overflow:auto'>
                <button class='append-new-guide d-flex align-items-center'><i class="material-icons  mr-2" style='color:var(--success)'>add</i> Add a file</button>
                <button class='edif-guide-files d-flex align-items-center ml-3 pl-2' style='border-left:2px solid rgb(110,110,110,.4)'><i class='fa fa-edit mr-2' style='color:#113C7A'></i> Modify files</button>
            </div>
            <div class="card-body" style='overflow:auto'>
                @if($Guides)
                    <form class='file-form' action='{{route("add.FileManage")}}' method="post"> @csrf
                        @foreach($Guides as $v)
                            <div class='row my-2 align-item-center form-outline flex-nowrap'>
                                <a class='col-1 d-flex align-items-center' href="/downloadGuides/8"><i class='fa fa-file-pdf mr-2' style='font-size: 40px; color:var(--danger); height: 50px;'></i></a>
                                <input class='col-lg mr-3' name='file_name[]' type='text' style='outline:none; border:none; font-size:15px; color: #113C7A; align-self:center;' required value='{{$v["file_name"]}}' placeholder='Enter File label...' />
                                <div class='col-3 d-flex'>
                                    <label class='btn d-none' style='width:100px; height:38px; background: #113C7A; color:#fff; text-transform: capitalize;' for='choose_file_{{$v["id"]}}'>
                                        <span style='font-size:12px;'>Choose File</span>
                                        <input class='col-2 choose_file ' name='file[]' id='choose_file_{{$v["id"]}}' type='file' style='display: none; font-size:12px; color: #113C7A; align-self:center;'/>
                                    </label>
                                    <a class='d-flex align-items-center mx-2 px-2 remove-file' href="/remove-guide/{{$v['id']}}/{{Crypt::encryptString($v['file_name'])}}"><i class='fa fa-trash' style='font-size: 20px; color:var(--danger); height: 50px;'></i></a>
                                </div>
                            </div>
                        @endforeach 
                        <input class='btn mt-4' style='background: #113C7A; color:#fff; text-transform: capitalize;' type='submit' value='Save files'/>
                    </form>
                @else
                <p>No File uploaded</p>
                @endif
                
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script defer>
    
        function RemoveElement(e){
            let form = document.querySelector('.file-form')
            let el = e.target.parentNode.parentNode.parentNode.parentNode
            form.removeChild(el)
            // console.log()
        }
        $(document).ready(function() {

            // function AppendNewFile(form,randId){
            //     if(form.find(`#choose_file_${randId}`)){
            //         AppendNewFile(form,Math.random()*100)
            //     }else{
            //         let fileInput = `<div class='row my-2 align-item-center form-outline flex-nowrap'>
            //                         <a class='col-1 d-flex align-items-center' href=""><i class='fa fa-file-pdf mr-2' style='font-size: 40px; color:var(--danger); height: 50px;'></i></a>
            //                         <input class='col-lg mr-3' name='file_name[]' type='text' style='outline:none; border:none; font-size:15px; color: #113C7A; align-self:center;' required placeholder='Enter File label...' />
            //                         <div class='col-3 d-flex'>
            //                             <label class='btn d-none' style='width:100px; height:38px; background: #113C7A; color:#fff; text-transform: capitalize;' for='choose_file_${randId}'>
            //                                 <span style='font-size:12px;'>Choose File</span>
            //                                 <input class='col-2 choose_file ' name='file[]' id='choose_file_${randId}' type='file' style='display: none; font-size:12px; color: #113C7A; align-self:center;'/>
            //                             </label>
            //                             <a class='d-flex align-items-center mx-2 px-2 remove-file' href=""><i class='fa fa-trash' style='font-size: 20px; color:var(--danger); height: 50px;'></i></a>
            //                         </div>
            //                     </div>`
            //         form.prepend(fileInput);
            //     }
            // }
            $(".append-new-guide").on("click", function(e){
                let form = $(this).parent().siblings('.card-body').find('form')
                let randId = Math.random()*100;
                let fileInput = `<div class='row my-2 align-item-center form-outline flex-nowrap'>
                                <a class='col-1 d-flex align-items-center' href=""><i class='fa fa-file-pdf mr-2' style='font-size: 40px; color:var(--danger); height: 50px;'></i></a>
                                <input class='col-lg mr-3' name='file_name[]' type='text' style='outline:none; border:none; font-size:15px; color: #113C7A; align-self:center;' required placeholder='Enter File label...' />
                                <div class='col-3 d-flex'>
                                    <label class='btn' style='width:100px; height:38px; background: #113C7A; color:#fff; text-transform: capitalize;' for='choose_file_${randId}'>
                                        <span style='font-size:12px;'>Choose File</span>
                                        <input class='col-2 choose_file ' name='file[]' id='choose_file_${randId}' type='file' style='display: none; font-size:12px; color: #113C7A; align-self:center;'/>
                                    </label>
                                    <div class='remove-added-file' onclick='RemoveElement(event)' role='button'><i class=' fa fa-trash mx-2 px-2' style='font-size: 40px; color:var(--danger);'></i></div>
                                </div>
                            </div>`
                form.prepend(fileInput);
                // if(form.find(`#choose_file_${randId}`)){
                //     AppendNewFile(form,Math.random()*100)
                // }else{
                // }
            })
            // $(".remove-added-file").on("click", function(e){
            //     // $(this).parent().parent().remove()
            //     // console.log($(this).parent().parent());
            //     alert('Pass')
            // })
            $(".remove-file").on("click", function(e){
                e.preventDefault()
                let filename = $(this).parent().siblings('input').val()
                let filevalue = $(this).siblings('label').find('input').val()

                if(confirm(`Do you really want to remove the file ${filename} ?`)){
                    location.href=$(this).attr('href')
                }
                // if(filevalue.length > 0 || filename.length > 0){
                // }else{
                //     $(this).remove()
                // }
            })
            $(".choose_file").on("change", function(e){
                let file = $(this).val().replace(/.*(\/|\\)/,'');
                let fileType = file.split('.')

                $(this).siblings('span').html(file);
            })

            $('.dissmiss-Request-Change').on('click',function(e){
                e.preventDefault()
                if(confirm('Do you really want to Dismiss this Buddy change request?')){
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
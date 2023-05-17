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

    <div class="container-fluid buddy-contents active" id="buddies_list"><br/>
        <div class="card mb-4">
            <div class="card-body" style='overflow:auto'>
                @if($Guides)
                    @foreach($Guides as $v)
                        <div class='row my-2 align-item-center form-outline flex-nowrap'>
                            <a class='col-1 d-flex align-items-center' href="/downloadGuides/8"><i class='fa fa-file-pdf mr-2' style='font-size: 40px; color:var(--danger); height: 50px;'></i></a>
                            <input class='col-lg mr-3' type='text' style='outline:none; border:none; font-size:15px; color: #113C7A; align-self:center;' required value='{{$v["file_name"]}}' placeholder='Enter File label...' />
                            <div class='col-3 d-flex'>
                                <label class='btn ' style='width:100px; height:38px; background: #113C7A; color:#fff; text-transform: capitalize;' for='choose_file_{{$v["id"]}}'>
                                    <span style='font-size:12px;'>Choose File</span>
                                    <input class='col-2 choose_file ' id='choose_file_{{$v["id"]}}' type='file' style='display: none; font-size:12px; color: #113C7A; align-self:center;'/>
                                </label>
                                <a class='d-flex align-items-center mx-2 px-2 remove-file' href="/downloadGuides/{{$v['id']}}"><i class='fa fa-trash' style='font-size: 20px; color:var(--danger); height: 50px;'></i></a>
                            </div>
                        </div>
                    @endforeach
                @else
                <p>No File uploaded</p>
                @endif
                <!-- <div class='row my-2 align-item-center form-outline flex-nowrap'>
                    <a class='col-1 d-flex align-items-center' href="/downloadGuides/8"><i class='fas fa-file-image mr-2' style='font-size: 40px; color: #113C7A; height: 50px;'></i></a>
                    <input class='col-6 mr-3' type='text' style='outline:none; border:none; font-size:15px; color: #113C7A; align-self:center;' required placeholder='Enter File label...' />
                    <div class='col d-flex'>
                        <label class=' btn d-flex flex-column' style='background: #113C7A; color:#fff; text-transform: capitalize;' for='choose_file'>
                            <span id='file_name' style='font-size:12px;'>Choose File</span>
                            <input class='col-2' id='choose_file' type='file' style='display: none; font-size:12px; color: #113C7A; align-self:center;'/>
                        </label>
                        <a class='d-flex align-items-center mx-2 px-2' href="/downloadGuides/8"><i class='fa fa-trash' style='font-size: 20px; color:var(--danger); height: 50px;'></i></a>
                    </div>

                </div> -->
                
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script defer>
    
        $(document).ready(function() {

            $(".remove-file").on("click", function(e){
                e.preventDefault()
                let filename = $(this).parent().siblings('input').val()
                let filevalue = $(this).siblings('label').find('input').val()

                if(filevalue.length > 0 || filename.length > 0){
                    if(confirm(`Do you really want to remove the file ${filename} ?`)){
                        location.href=$(this).attr('href')
                    }
                }else{
                    location.href=$(this).attr('href')
                }
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
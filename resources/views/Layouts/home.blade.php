<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>International Students Affairs</title>
  <link href="{{asset('homeassets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('homeassets/css/landingPage.css')}}" rel="stylesheet" type="text/css">
  <script src="{{asset('homeassets/js/index.js')}}"></script>
</head>
<body>
    <main class="w-screen h-screen z-[2]">
        <div class="main-container h-full p-3">
            <div class="form rounded-md translate-x-[5%] left-0 translate-y-[-50%] 2xl:translate-x-[50%] relative md:absolute w-[90%] max-w-[40rem] md:w-[45%]  h-[95%] overflow-y-auto p-3 ">
                <div class="position-control-container w-full p-3">
                    <div class="flex md:hidden place-items-center place-content-center">
                        <img class="w-[80px]" src="{{asset('asset/img/strathLogo1.png')}}">
                        <img class="w-[100px] h-[50px] invert" src="{{asset('asset/img/strathLogo2.png')}}">
                    </div>
                    <div class="position-control hidden md:flex flex-row-reverse gap-1">
                        <div class="right-position" onclick="setPosition(event)"></div>
                        <div class="left-position active" onclick="setPosition(event)"></div>
                    </div>
                </div>
                <form action="{{ route('login') }}" method="POST" class="form-container h-full"> @csrf
                    <div class="form-body my-auto">
                        <h2 class="my-auto mb-6 text-center text-slate-200 text-[20px] uppercase">SU Portal | Login</h2>
                        <div class="input-fields-container grid gap-6 ">
                            <!-- <x-auth-validation-errors class="rounded-md p-2 w-full text-gray-100 bg-red-700" :errors="$errors" /> -->
                            @if($errors->any())
                                <div class="rounded-md p-2 w-full text-gray-100 bg-red-900" role="alert">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="input-field w-full rounded-md relative ">
                                <div class='flex bg-white overflow-hidden rounded-md'>
                                    <label class="absolute text-[15px] translate-y-[50%] left-[10px] text-slate-400" for="username">SU Id | Email</label>
                                    <input type="text" class="w-full p-2 pt-4 outline-none " name='Su_Id_or_Email' value="{{old('Su_Id_or_Email')}}" autofocus  onfocusin="inputFocusIn(event)" onfocusout="inputFocusOut(event)" id="username">
                                    <i class="fa fa-user px-4 flex place-items-center place-content-center"></i>
                                </div>
                                <small class="text-red-500 text-xs">@error('Su_Id_or_Email') {{$message}} @enderror</small>
                            </div>
                            <div class="input-field w-full rounded-md relative ">
                                <div class='flex bg-white overflow-hidden rounded-md'>
                                    <label class="absolute text-[15px] translate-y-[50%] left-[10px] text-slate-400" for="password">Password</label>
                                    <input type="password" class="w-full p-2 pt-4 outline-none " name='password' onfocusin="inputFocusIn(event)" onfocusout="inputFocusOut(event)" id="password">
                                    <i class="fa fa-lock px-4 flex place-items-center place-content-center"></i>
                                </div>
                                <small class="text-red-500 text-xs">@error('password') {{$message}} @enderror</small>
                            </div>
                        </div>
                        <div class="sub-btn w-full mt-10 grid place-items-center place-content-center">
                            <button type="submit" class="py-2 px-4 w-[150px] rounded text-white bg-[#D0A153]">Login</button>
                        </div>
                    </div>
                    <div class="form-footer w-full p-2">
                        <h3 class='mb-2 text-[15px] text-slate-300' >Useful resources</h3>
                        <div class="more-links-container p-2 mb-2">
                            @if($Guides)
                            @foreach($Guides as $v)
                                <a class='d-flex ' href="/downloadGuides/{{Crypt::encrypt($v['file_name'])}}"><i class='fa fa-file-pdf mr-2' ></i><span style='font-size:12px; color: #fff; align-self:center;'>{{explode('.',$v['file_name'])[0]}}</span></a>
                            @endforeach
                            @endif
                        </div>
                        <h3 class='mb-4 text-[15px] text-slate-300'>More links</h3>
                        <div class="more-links-container text-sm">
                            @if($more_links)
                            @foreach($more_links as $v)
                                @if($v['title'] !== 'Sign in')
                                <a href="{{$v['link']}}" class="more-link p-1">
                                    <i class="{{$v['icon']}} pr-2"></i>{{$v['title']}}
                                </a>
                                @endif
                            @endforeach
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <div class="quote px-4 h-full md:w-[45%] translate-y-[-50%] md:translate-x-[5%] p-3 hidden md:grid my-auto place-content-center text-slate-300">
                <div class="flex py-3 place-content-center place-items-center">
                    <img class="w-[100px]" src="{{asset('asset/img/strathLogo1.png')}}">
                    <img class="w-[200px] h-[100px] invert" src="{{asset('asset/img/strathLogo2.png')}}">
                </div>
                <div class="quote-container p-2 rounded-[5px]" onmouseover="quoteHover(event) " onmouseout="quoteHoverOut(event)"></div>
            </div>
        </div>
    </main>
</body>

</html>
<script>
    let FOCUS_COLOR = '#D0A153';

    let quotes = [
        {
            author: 'Mission',
            quote: 'To provide a student-centered, co-curricular environment that enhances the academic mission of the university and help students to be better persons through personal development programmes.',
        },
        {
            author: 'Vision',
            quote: 'To provide quality and challenging extracurricular activities to all Strathmore University students in contribution to the University’s mission of offering an all-round education.',
        },
        {
            author: 'Values',
            quote: 'Fostering excellence, freedom and responsibility; ethical practice; service to society; continuous improvement.',
        }
    ]

    let quotContainer = document.querySelector('.quote-container')

    function getQuote(index) {
        let item = quotes[index]
        quotContainer.innerHTML=`
        <p class="max-w-[50rem]">${item.quote}</p>
        <p class="m-0 w-full font-semibold text-[${FOCUS_COLOR}] text-sm text-center italic py-3">-- ${item.author} --</p>
        `
    }
    let i=quotes.length-1
    getQuote(i);
    let QuoteRoll = setInterval(()=>{
        getQuote(i)
        if(i == 0){
            i=quotes.length-1
        }else{
            i --
        }
    }, 5500);
    // quotes.forEach((item)=>{
    // })
    function quoteHover(e){
        let el = e.target
        if(el.classList.contains('quote-container')){
            el.style.background='rgb(208,161,83,.2)'
        }else{
            el.parentNode.style.background='rgb(208,161,83,.2)'
            // e.target.style.color='#fff'
        }
        clearInterval(QuoteRoll)
        QuoteRoll = null
    }
    function quoteHoverOut(e){
        let el = e.target
        if(el.classList.contains('quote-container')){
            el.style.background=''
        }else{
            el.parentNode.style.background=''
        }
        QuoteRoll=setInterval(()=>{
            getQuote(i)
            if(i == 0){
                i=quotes.length-1
            }else{
                i --
            }
        }, 5500);
    }

    function inputFocusIn(e) {
        let el = e.target,
            label = el.previousElementSibling
        label.style.cssText = `
            color: ${FOCUS_COLOR};
            font-size: 10px;
            left: 5px;
            transform: translateY(0%);
        `
        label.classList.remove('text-slate-400')
        el.nextElementSibling.style.color = FOCUS_COLOR;
    }

    function inputFocusOut(e) {
        let el = e.target,
        label = el.previousElementSibling
        if(el.value == ""){
            label.style.cssText = `
                font-size: revert;
                transform: translateY(50%);
            `
            label.classList.add('text-slate-400')
            el.nextElementSibling.style.color = 'initial';
        }else{
            label.style.color = '#048753'
            el.nextElementSibling.style.color = '#048753';
        }
    }

    function setPosition(el) {
        let e = el.target,
            e_class = el.classList,
            eParent = e.parentNode
        let currentPosition = e.classList.contains('right-position') ? 'left-position' : 'right-position'
        eParent.querySelector(`.${currentPosition}`).classList.remove('active')
        e.classList.add('active')

        let formContainer = document.querySelector('.form'),
            quoteContainer = document.querySelector('.quote')

        if (currentPosition == 'left-position') {
            formContainer.style.cssText = `
            left: 50%;
            `
            quoteContainer.style.cssText = `
            right: 55%;
            `
        } else {
            formContainer.style.cssText = `
            left: 0%;
            `
            quoteContainer.style.cssText = `
            right: 5%;
            `
        }

    }
</script>
  <script src="{{asset('asset/js/scripts.js')}}"></script>
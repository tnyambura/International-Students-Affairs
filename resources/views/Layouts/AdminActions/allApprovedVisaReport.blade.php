<!DOCTYPE html>
<html>
<head>
    <title>List of all Approved Visas</title>
    <style>
       table{
        border-collapse: collapse;
       }
        
        th {
            background-color: #000;
            color: #fff;
            border: 1px solid #000;
            text-align: left;
            font-size: 12px;
            padding: 4px;
            text-transform: uppercase;
            font-weight: bold;
            letter-spacing: 2px;
            text-align: center;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        
        td {
            border: 1px solid #000;
            text-align: center;
            padding: 2px;
            /* font-size: x-small; */
        }
        
        .divTableCell,
        .divTableHead {
            padding: 0px !important;
            border: 0px !important;
            font-size: x-small;

        }
    </style>
</head>
<body style='display:flex; flex-direction:column;'>
    <div style='flex-grow:1;'>
        <div class='d-flex flex-column justify-content-center' style="text-align: center;">
            <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('asset/img/logo.png')))}}" style="width:220px; height:150px;">    
            <h2>Strathmore University International Students Affairs</h2>
        </div>
        <div style="text-align: center;">
            <i class="fas fa-table mr-1" style="text-decoration:underline"></i><u>
                List of all Approved Visas</u>
        </div><br/>    
        <div class="row">             
            <div class="table table-bordered"  >
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>SU Id </th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Application Date</th>
                        <th>Type</th>
                    </tr>
                </thead>
                <tbody>
                @php $count=1; @endphp
                @foreach($exVisas as $visa)
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$visa['student_id']}}</td>
                        <td>{{$visa['surname'].' '.$visa['other_names']}}</td>
                        <td>{{$visa['email']}}</td>
                        <td>{{$visa['phone_number']}}</td>
                        <td>{{$visa['nationality']}}</td>
                        <td>{{$visa['application_date']}}</td>
                        <td>Ext</td>
                    </tr>
                    @php $count = $count+1; @endphp
                @endforeach
                @foreach($kppVisas as $kppVisa)
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$kppVisa['student_id']}}</td>
                        <td>{{$kppVisa['surname'].' '.$kppVisa['other_names']}}</td>
                        <td>{{$kppVisa['email']}}</td>
                        <td>{{$kppVisa['phone_number']}}</td>
                        <td>{{$kppVisa['nationality']}}</td>
                        <td>{{$kppVisa['application_date']}}</td>
                        <td>Kpp</td>
                    </tr>
                    @php $count = $count+1; @endphp
                @endforeach
                    </tbody>
                </table>
    
                
            </div>
        </div>

    </div>
    <div style='border-top: 1px solid rgba(110,110,110,.75); margin-top:20px; '>
        <small class="mb-0"><strong>Report Generated on</strong>: <?php echo date('d.m.Y'); ?></small><br>
        <small><strong>Time Generated </strong>: <?php date_default_timezone_set("Africa/Nairobi"); echo date("h:i:sa");?></small><br>
        <small><strong>Generated By </strong>: {{ Auth::user()->other_names}}</small>
    </div>
</body>
</html>
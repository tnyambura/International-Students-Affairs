<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>NEW APPLICATION VIEW</title>
        <link href="../../asset/css/styles.css" rel="stylesheet"/>
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
            <div id="layoutSidenav_content">
            <main>
                    <div class="container-fluid"></br>  
                    <ol class="breadcrumb mb-4" style="background:#286DE7;">
                            <li class="breadcrumb-item active" style="color:white;">Student pass Application Request View</li>
                        </ol> 
                        <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table mr-1"></i>
                                    My Student Pass Application View.
                                    </div>
                                    <div class="card-body">                                    
                                     <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                            <label for="Surname">Surname:</label>&nbsp&nbsp{{$data->surNAME}}                                  
                                            </div>
                                            <div class="col-md-4 mb-3">
                                            <label for="Othernames">Other Names:</label>&nbsp&nbsp{{$data->otherNAMES}}                                                                      
                                            </div>
                                            <div class="col-md-4 mb-3">
                                            <label for="PassportNumber">Passport Number:</label>&nbsp&nbsp{{$data->passportNUMBER}}
                                            </div>
                                                                         
                                     </div>
                                     <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                            <label for="dateofENTRY">Date Of Entry:</label>&nbsp&nbsp{{$data->dateofENTRY}}                                  
                                            </div>
                                            <div class="col-md-4 mb-3">
                                            <label for="Othernames">Date Requested:</label>&nbsp&nbsp{{$data->created_at}}                                                                      
                                            </div>
                                            <div class="col-md-4 mb-3">
                                            <label for="PassportNumber">Strathmore ID:</label>&nbsp&nbsp{{$data->suID}}
                                            </div>                                    
                                     </div><br/>
                                     <h4>uploaded Documents</h4><br/>

                                     <div class="container">
     
                                            <div class="row">
                                            <div class="col-sm-6">
                                            <label>Passport Biodata Page:</label>&nbsp&nbsp
                                            <a href="/NewkppAPPFILEDOWNLOAD/{{$data->biodataPAGE}}" style="color:green">
                                            <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>
                                            </div>
                                            <div class="col-sm-6">
                                            <label>Passport Visa Page:</label>&nbsp&nbsp
                                            <a href="/NewkppAPPFILEDOWNLOAD/{{$data->currentVISA}}" style="color:green">
                                            <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>
                                            </div>
                                            </div></br>
                                            <div class="row">
                                            <div class="col-sm-6">
                                            <label>Academic Transcripts:</label>&nbsp&nbsp
                                            <a href="/NewkppAPPFILEDOWNLOAD/{{$data->academicTRANSCRIPTS}}" style="color:green">
                                            <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>
                                            </div>
                                            <div class="col-sm-6">
                                            <label>Parents ID/Biodata Page:</label>&nbsp&nbsp
                                            <a href="/NewkppAPPFILEDOWNLOAD/{{$data->guardiansID}}"style="color:green" >
                                            <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>
                                            </div>
                                            </div></br>
                                            <div class="row">
                                            <div class="col-sm-6">
                                            <label>Commitment Letter:</label>&nbsp&nbsp
                                            <a href="/NewkppAPPFILEDOWNLOAD/{{$data->commitmentLETTER}}" style="color:green">
                                            <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>
                                            </div>
                                            <div class="col-sm-6">
                                            <label>Police Clearance/Good Conduct:</label>&nbsp&nbsp
                                            <a href="/NewkppAPPFILEDOWNLOAD/{{$data->policeCLEARANCE}}" style="color:green">
                                            <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>
                                            </div>
                                            </div></br>
                                            <div class="row">
                                            <div class="col-sm-6">
                                            <label>Most Recent Passport Pictures:</label>&nbsp&nbsp
                                            <a href="/NewkppAPPFILEDOWNLOAD/{{$data->passportPICTURE}}" style="color:green">
                                            <span class="fas fa-eye" aria-hidden="false" style="color:green"></span> Download</a> </li>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;Office of the International Students Affairs <?php echo date('Y'); ?></div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js"/>
   
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/assets/demo/chart-area-demo.js"></script>
        <script src="../../asset/assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../../asset/assets/demo/datatables-demo.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    </body>
</html>

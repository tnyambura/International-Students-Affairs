                var uploadpassportPICTURE = document.getElementById("passportPICTURE");
                var uploadbiodataPAGE = document.getElementById("biodataPAGE");
                var uploadcurrentVISA = document.getElementById("currentVISA");
                var uploadentryV = document.getElementById("entryV");
                var uploadguardiansID = document.getElementById("guardiansID");
                var uploadcommitmentLETTER = document.getElementById("commitmentLETTER");
                var uploadacademicTRANSCRIPTS = document.getElementById("academicTRANSCRIPTS");
                var uploadpoliceCLEARANCE = document.getElementById("policeCLEARANCE");

                uploadpassportPICTURE.onchange = function() {

                    const oFile = document.getElementById("passportPICTURE").files[0];                    
                    if (oFile.size > 2097152) // 2 MiB for bytes.
                        {
                        alert("Passport Sized Pictures File must be below 2MB!");
                        this.value = "";
                        }
                };
                uploadbiodataPAGE.onchange = function() {
                    const oFile = document.getElementById("biodataPAGE").files[0];                    
                    if (oFile.size > 2097152) // 2 MiB for bytes.
                        {
                            alert("Biodata Page File must be below 2MB!");
                        this.value = "";
                        }
                };
                uploadcurrentVISA.onchange = function() {
                    const oFile = document.getElementById("currentVISA").files[0];                    
                    if (oFile.size > 2097152) // 2 MiB for bytes.
                        {
                            alert("Curent Visa Page File must be below 2MB!");
                        this.value = "";
                        }
                };
                uploadguardiansID.onchange = function() {
                    const oFile = document.getElementById("guardiansID").files[0];                    
                    if (oFile.size > 2097152) // 2 MiB for bytes.
                        {
                            alert("Guardians Biodata/ID File must be below 2MB!");
                        this.value = "";
                        }
                };
                uploadcommitmentLETTER.onchange = function() {
                    const oFile = document.getElementById("commitmentLETTER").files[0];                    
                    if (oFile.size > 2097152) // 2 MiB for bytes.
                        {
                            alert("Commitment Letter File must be below 2MB!");
                        this.value = "";
                        }
                };
                uploadacademicTRANSCRIPTS.onchange = function() {
                    const oFile = document.getElementById("academicTRANSCRIPTS").files[0];                    
                    if (oFile.size > 2097152) // 2 MiB for bytes.
                        {
                            alert("Academic Transcripts File must be below 2MB!");
                        this.value = "";
                        }
                };
                uploadpoliceCLEARANCE.onchange = function() {
                    const oFile = document.getElementById("policeCLEARANCE").files[0];                    
                    if (oFile.size > 2097152) // 2 MiB for bytes.
                        {
                            alert("Good Conduct/Police Clearance File must be below 2MB!");
                        this.value = "";
                        }
                };

                uploadentryV.onchange = function() {
                    const oFile = document.getElementById("entryV").files[0];                    
                    if (oFile.size > 2097152) // 2 MiB for bytes.
                        {
                            alert("The entry Visa File must be below 2MB!");
                        this.value = "";
                        }
                };
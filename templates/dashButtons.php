<div class="contents">
                <script>
                  
                    // /* event listeners */

                    const homeButton = document.getElementsByClassName("homeButton")[0],
                          penAssigned = document.getElementsByClassName("penAssigned")[0],
                          penUnassigned = document.getElementsByClassName("penUnassigned")[0],
                          prevAppButton = document.getElementsByClassName("prevAppButton")[0],
                          certAppButton = document.getElementsByClassName("certAppButton")[0],
                          rejButton = document.getElementsByClassName("rejButton")[0],
                          allAppButton = document.getElementsByClassName("allAppButton")[0],
                          contents = document.getElementsByClassName("contents")[0];

                    window.onload = () => {
                        contents.innerHTML = `<?php require "./templates/homeTemplate.php"?>`;
                        
                    };
                    homeButton.addEventListener('click', () => {
                        contents.innerHTML = `<?php require "./templates/homeTemplate.php"; ?>`;     
                    });

                    penAssigned.addEventListener('click', () => {
                        contents.innerHTML = `<?php require "./templates/pendingAssigned.php"; ?>`;
                        blowUp();
                    });

                    penUnassigned.addEventListener('click', () => {
                        contents.innerHTML = `<?php require "./templates/pendingUnassigned.php"; ?>`;
                        blowUp();
                    });

                    prevAppButton.addEventListener('click', () => {
                        contents.innerHTML = `<?php require "./templates/prevAppTemplate.php"; ?>`;
                        blowUp();
                    });

                    certAppButton.addEventListener('click', () => {
                        contents.innerHTML = `<?php require "./templates/certAppTemplate.php"; ?>`;
                        blowUp();
                    });     

                    rejButton.addEventListener('click', () => {
                        contents.innerHTML = `<?php require "./templates/rejAppTemplate.php"; ?>`;
                        blowUp();
                    });  
                    allAppButton.addEventListener('click', () => {
                        contents.innerHTML = `<?php require "./templates/AllAppTemplate.php"; ?>`;
                        blowUp();
                    });
                </script>
            </div>
           
<div class="contents" style="max-height: 50vh;">
                <script>
                  
                    // /* event listeners */

                    const statsButton = document.getElementsByClassName("statsButton")[0],
                          penAssButton = document.getElementsByClassName("penAssButton")[0],
                          compAssButton = document.getElementsByClassName("compAssButton")[0],
                          contents = document.getElementsByClassName("contents")[0];

                    window.onload = () => {
                        contents.innerHTML = `<?php require "statsTemplate.php"?>`;
                    };
                    statsButton.addEventListener('click', () => {
                        contents.innerHTML = `<?php require "./templates/statsTemplate.php"; ?>`;     
                    });

                    penAssButton.addEventListener('click', () => {
                        contents.innerHTML = `<?php require "./templates/pendingEvaluator.php";  ?>`;
                        blowUp();
                    });

                    compAssButton.addEventListener('click', () => {
                        contents.innerHTML = `<?php require "./templates/completeEvaluator.php"; ?>`;
                        blowUp();
                    });
                </script>
            </div>
           
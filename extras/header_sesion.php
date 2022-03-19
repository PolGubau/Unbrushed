

<div class="screen_unset"></div>

<div class="zoom zoomin hidden">
    <p>+</p>

</div>
<div class="zoom zoomout hidden">
    <p>-</p>

</div>
<header>
    <div class="back_box link_s" id="back" data-href="./">
        <a class="back_icon">

            <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 173.12 147.78">
                <title>back</title>
                <g id="Capa_2" data-name="Capa 2">
                    <g id="Capa_1-2" data-name="Capa 1">
                        <path d="M173.12,147.78a114,114,0,0,0-114-114l-1,23a90,90,0,0,1,90,90Z" />
                        <polyline points="55.34 0 0 52.35 70.91 90.67" />
                    </g>
                </g>
            </svg>
        </a>
    </div>
    <div class="dark_mode" id="darkmode">
        <div class="dark_icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 65 65">
                <defs>
                    <style>
                        .svg_sol {
                            fill: #fff;
                        }

                        .svg_sol_lines {
                            fill: none;
                            stroke: #fff;
                            stroke-miterlimit: 10;
                            stroke-width: 7px;
                        }
                    </style>
                </defs>
                <title>sol</title>
                <g id="Capa_2" data-name="Capa 2">
                    <g id="Capa_1-2" data-name="Capa 1">
                        <path class="svg_sol" d="M32.5,22.78a9.72,9.72,0,1,1-9.72,9.72,9.73,9.73,0,0,1,9.72-9.72m0-6.13A15.85,15.85,0,1,0,48.35,32.5,15.85,15.85,0,0,0,32.5,16.65Z" />
                        <line class="svg_sol_lines" x1="32.5" y1="54.91" x2="32.5" y2="65" />
                        <line class="svg_sol_lines" x1="32.5" x2="32.5" y2="10.09" />
                        <line class="svg_sol_lines" x1="10.09" y1="32.5" y2="32.5" />
                        <line class="svg_sol_lines" x1="65" y1="32.5" x2="54.91" y2="32.5" />
                        <line class="svg_sol_lines" x1="16.65" y1="48.35" x2="9.52" y2="55.48" />
                        <line class="svg_sol_lines" x1="55.48" y1="9.52" x2="48.35" y2="16.65" />
                        <line class="svg_sol_lines" x1="16.65" y1="16.65" x2="9.52" y2="9.52" />
                        <line class="svg_sol_lines" x1="55.48" y1="55.48" x2="48.35" y2="48.35" />
                    </g>
                </g>
            </svg>
        </div>
    </div>

    <div class="titles">
        <h1 class="unbrushed centered ">
            <?php
          
          if(isset($name)) echo $name;
            

            ?>
        </h1>
        <h3 class="data centered">
            <?php
            if(isset($date)) echo '<p clas="date">'.$date.'</p>';
            if(isset($comments)) echo '<p class="comments">'.$comments.'</p>';
               
            ?>

        </h3>
      
        </div>
        
    </div>
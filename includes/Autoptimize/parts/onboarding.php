<?php defined( 'ABSPATH' ) or die(); ?>

<div class="main-section">
    <div class="plugin-steps">
        <div class="logo-section">
            <img src="https://unusedcss.io/wp-content/uploads/2020/09/logo.svg" alt="UnusedCSS.io logo">
        </div>
        <div class="steps-wrap">
            <div class="step-text">
				<?php
                    $step = 1;
                    $steps = [
                        'Install and Actvate',
                        'Enable',
                        'Connnect',
                        'Run First Job'
                    ];

                    if(class_exists('autoptimizeOptionWrapper') &&
                        autoptimizeOptionWrapper::get_option( 'autoptimize_css' ) == "" ){
                        $step = 2;
                    }else if(
	                    is_plugin_active('autoptimize/autoptimize.php') &&
	                    class_exists( 'autoptimizeOptionWrapper' ) &&
	                    autoptimizeOptionWrapper::get_option( 'autoptimize_css' ) == "on" &&
	                    ! UnusedCSS_Autoptimize_Admin::is_api_key_verified()
                    ) {
	                    $step = 3;
                    } else if ( UnusedCSS_Autoptimize_Admin::is_api_key_verified() ) {
	                    $step = 4;
                    }
				?>
                <ul>
                    <li><span class="current"><?php echo $step ?></span>/4</li>
                </ul>
            </div>
            <div class="progress-bar-wrap">
                <div id="progress-bar" style="width: <?php echo $step * 25 ?>%;"></div>
            </div>
        </div>
        <div class="card">
            <div class="slide-contents-wrap">
                <div class="slide-contents" style="<?php
				if ( ( $step - 1 ) !== 0 ) {
                        echo sprintf('transform: translate3d(%spx, 0px, 0px); transition-duration: 0.5s;',(($step - 1) * 223 * -1));
                    }
                ?>">
                    <div class="actions slide-content <?php echo is_plugin_active('autoptimize/autoptimize.php') ? 'done' : null ?>">
                        <img src="<?php echo UUCSS_PLUGIN_URL . 'assets/wp-rocket-hosting.webp'?>" alt="">
                        <h2>Autoptimize install and Activate</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                        <a class="act-button js-activate-ao"
                           href="<?php
                            if(file_exists(ABSPATH . PLUGINDIR . '/autoptimize/autoptimize.php')){
                                echo UnusedCSS_Utils::activate_plugin( 'autoptimize/autoptimize.php' );
                            }else{
                                echo network_admin_url( 'plugin-install.php?tab=plugin-information&plugin=autoptimize' );
                            }
                           ?>"
                           data-activation_url="<?php  echo UnusedCSS_Utils::activate_plugin( 'autoptimize/autoptimize.php' ); ?>"
                           target="_blank">
                        Install  & Activate
                        </a>
                    </div>
                    <div class="actions slide-content <?php
                        if(class_exists('autoptimizeOptionWrapper') && autoptimizeOptionWrapper::get_option( 'autoptimize_css' ) == "on") {
                            echo 'done';
                        }
                    ?>">
                        <img src="<?php echo UUCSS_PLUGIN_URL . 'assets/wp-rocket-hosting.webp'?>" alt="">
                        <h2>Configure Autoptimize</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                        <a class="act-button js-enable-css-ao " href="<?php echo admin_url('/options-general.php?page=autoptimize') ?>" target="_blank">Configure</a>
                    </div>
                    <div class="actions slide-content <?php
                        if(UnusedCSS_Autoptimize_Admin::is_api_key_verified()){
                            echo 'done';
                        }
                    ?>">
                        <h2>Connect & Activate</h2>
                        <svg id="Layer_2___cjvgcjemkzrtp0871jgmvvado" data-name="Layer 2"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300"><title>0</title>
                            <path d="M69.18,216.47l105.69,61.7a8.92,8.92,0,0,0,9,0L310,205.35a8.92,8.92,0,0,0,0-15.47l-107-61a8.92,8.92,0,0,0-8.88,0L69.22,201A8.92,8.92,0,0,0,69.18,216.47Z"
                                  fill="#aa29a4"></path>
                            <path d="M163.8,23.29c-13.85,8.21-48.12,28.49-58.37,34.45a5.73,5.73,0,0,0-2.85,5V203.45c-.21,2.87,3,5.53,5.68,4l57.63-32.81c2.32-1.33,3.8-3.2,3.8-5.87V26.64A3.9,3.9,0,0,0,163.8,23.29Z"
                                  fill="#172d51"></path>
                            <path d="M169.3,25,151,35.54v3.92a1.88,1.88,0,0,1-.94,1.63l-14,8.11a1.24,1.24,0,0,1-1.86-1.07V45.26L107.79,60.7a1.67,1.67,0,0,0-.82,1.44V202.78a1.14,1.14,0,0,0,1.71,1l61-35.36A6.05,6.05,0,0,1,167,174c-3.16,2-58.74,33.46-58.74,33.46s-4.39,2-5.68-3.26V62.73A5.79,5.79,0,0,1,105,58c2.55-1.85,58.84-34.75,58.84-34.75A4,4,0,0,1,169.3,25Z"
                                  fill="#68e1fd"></path>
                            <path d="M230.78,196.61a3.92,3.92,0,0,1-.8,3.22c-1.22,1.31-5.86,5.42-6.3,6.31s-1.06,3.32,0,4.16,3.12.94,5.64,0a44.67,44.67,0,0,0,9.73-6.08c1.12-1.22,0-13.75,0-13.75s-6.51-1.59-8.7,0Z"
                                  fill="#f96156"></path>
                            <path d="M223.18,207.85a2.59,2.59,0,0,0,.51,2.42c1.06.84,3.12.94,5.64,0a44.67,44.67,0,0,0,9.73-6.08,6,6,0,0,0,.48-2.83C235.32,205.39,226.4,212.11,223.18,207.85Z"
                                  fill="#391a3a"></path>
                            <path d="M233.45,201.38a3.8,3.8,0,0,0-1.56-1.34,5.22,5.22,0,0,0-2.31-.24c-.64,0-.64,1,0,1a3,3,0,0,1,3,1.08C233,202.39,233.84,201.89,233.45,201.38Z"
                                  fill="#391a3a"></path>
                            <path d="M232,203.11a4.47,4.47,0,0,0-4.27-1.5c-.63.13-.36,1.09.27,1a3.47,3.47,0,0,1,3.29,1.25C231.76,204.29,232.47,203.58,232,203.11Z"
                                  fill="#391a3a"></path>
                            <path d="M246.22,204.28a3.92,3.92,0,0,1-.8,3.22c-1.22,1.31-5.86,5.42-6.3,6.31s-1.06,3.32,0,4.16,3.12.94,5.64,0a44.67,44.67,0,0,0,9.73-6.08c1.12-1.22,0-13.75,0-13.75s-6.51-1.59-8.7,0Z"
                                  fill="#f96156"></path>
                            <path d="M238.62,215.51a2.59,2.59,0,0,0,.51,2.42c1.06.84,3.12.94,5.64,0a44.67,44.67,0,0,0,9.73-6.08A6,6,0,0,0,255,209C250.76,213.05,241.84,219.78,238.62,215.51Z"
                                  fill="#391a3a"></path>
                            <path d="M248.89,209.05a3.8,3.8,0,0,0-1.56-1.34,5.22,5.22,0,0,0-2.31-.24c-.64,0-.64,1,0,1a3,3,0,0,1,3,1.08C248.41,210.06,249.28,209.56,248.89,209.05Z"
                                  fill="#391a3a"></path>
                            <path d="M247.47,210.78a4.47,4.47,0,0,0-4.27-1.5c-.63.13-.36,1.09.27,1a3.47,3.47,0,0,1,3.29,1.25C247.2,212,247.91,211.25,247.47,210.78Z"
                                  fill="#391a3a"></path>
                            <path d="M232.09,118.94a67.85,67.85,0,0,0-5.65,25.2c-.22,13.78,1.41,50.81,1.41,50.81s3.82,3.67,12.21,2.38V145.95S243,147,243,149.21s2.68,54.74,2.68,54.74,1.5,2.79,12.48-1.47c0,0,1.5-68.81-6.56-82.32"
                                  fill="#5b434d"></path>
                            <polyline points="191.77 141.44 191.77 220.64 214.56 233.68 240.3 218.48 240.3 139.27"
                                      fill="#68e1fd"></polyline>
                            <polygon points="191.77 141.44 218.22 126.38 240.3 139.27 214.56 154.48 191.77 141.44"
                                     fill="#68e1fd"></polygon>
                            <polygon points="214.56 154.48 214.56 233.68 240.3 218.48 240.3 139.27 214.56 154.48"
                                     fill="#68e1fd"></polygon>
                            <polyline points="191.77 141.44 191.77 220.64 214.56 233.68 240.3 218.48 240.3 139.27"
                                      fill="#2e90a0" opacity="0.1"></polyline>
                            <polygon points="191.77 141.44 218.22 126.38 240.3 139.27 214.56 154.48 191.77 141.44"
                                     fill="#68e1fd"></polygon>
                            <polygon points="214.56 154.48 214.56 233.68 240.3 218.48 240.3 139.27 214.56 154.48"
                                     fill="#2e90a0" opacity="0.47"></polygon>
                            <polyline points="214.12 140.73 201.24 146.86 201.24 226.06 136.89 191.25" fill="none"
                                      stroke="#1b1464" stroke-miterlimit="10"></polyline>
                            <polygon points="226.37 150.29 245.57 139.02 215.06 121.86 197.21 133.14 226.37 150.29"
                                     fill="#5b434d"></polygon>
                            <path d="M230.94,122.58c5.25,1.82,10.61,1.92,16.1,1.6a32.14,32.14,0,0,0,5.43-7.72c4.69-9.7,6.38-26,6.38-26s-7-5.41-11.64-6.71-14.89,1-16.57,3.81-2.3,15.45,0,33.42C230.71,121.3,230.89,122.27,230.94,122.58Z"
                                  fill="#a5dd73"></path>
                            <path d="M239.79,85.45c-1.64.35-1.95-4.19-1.25-4.61s8.38-.47,9.56.06c2.59,1.15,0,5,0,5"
                                  fill="#a5dd73"></path>
                            <path d="M249.66,66.46c-1.48-.26-1.43-2.73-4.18-3.85s-6,.49-7.2,1.36-2.08-.9-3.4.46-.48,3.44-1.25,4.18l-.11.08a3.83,3.83,0,0,0-.11,3.72,11.23,11.23,0,0,0,2.11,2.15L247.86,81c1.49-1.05,4.34-11,4.18-12.19A2.6,2.6,0,0,0,249.66,66.46Z"
                                  fill="#200904"></path>
                            <path d="M236.12,70.23c-.56.6,1.29,12.5,4.9,12.92s7.88-4.36,8.26-5.78.16-9-1.31-9.76S239.51,66.58,236.12,70.23Z"
                                  fill="#f67770"></path>
                            <path d="M237.81,66.8s-.71,2.77,3.61,3.29,4.62,1.49,5.13,3c1,2.85,4,6.16,5-2.39.05-.41-3.06-6.27-6.42-6.73S237.81,66.8,237.81,66.8Z"
                                  fill="#200904"></path>
                            <path d="M246.94,74.61s1.36-2.34,2.41-1.23.29,3.72-1.13,4.54" fill="#f67770"></path>
                            <path d="M214.18,124s-3.52,2.78-4.45,3.34,4,2.16,4.08,2.71,4.82-3.73,4.82-3.73Z"
                                  fill="#f67770"></path>
                            <polygon points="226.37 150.29 218.86 131 189.7 113.78 197.21 133.14 226.37 150.29"
                                     fill="#172d51"></polygon>
                            <path d="M230.64,87.56s-1.9,2.72-2.78,9.89-3.41,13.41-4.87,15.67-11.15,11.32-10.75,12.22,3,2.5,4.69,3.1a52.72,52.72,0,0,0,12.52-10.93c5-6.37,4.83-17.66,4.83-17.66"
                                  fill="#a5dd73"></path>
                            <path d="M233.91,142.89a6.23,6.23,0,0,1,.46-2.21,3,3,0,0,1,1-.88,13.31,13.31,0,0,0,1.38-1l3.4-3.6-5.13-.77a39.07,39.07,0,0,1-3.5,2.07c-.23,0-3.5,2-3.34,2.5s2.36-1.18,2.36-1.18a24.54,24.54,0,0,0-3.52,1.93c-.4.47-.92,2.86-.56,3.19s.92,0,1.29-.18-.25,1,.32,1.19a4.11,4.11,0,0,0,1.33.23,1.2,1.2,0,0,0,1.38-.19,7.77,7.77,0,0,0,1.46-2.76s-.13,2.87.69,2.68C233.22,143.8,233.57,143.4,233.91,142.89Z"
                                  fill="#f67770"></path>
                            <path d="M230.31,138.66a6,6,0,0,0-1.69,1.12,5.31,5.31,0,0,0-1.12,2.77c-.06.28.39.34.44.06a4.44,4.44,0,0,1,1.18-2.69,7.82,7.82,0,0,1,1.63-1A1.83,1.83,0,0,1,230.31,138.66Z"
                                  fill="#5b434d"></path>
                            <path d="M231.52,139.17a8.8,8.8,0,0,0-1.38,1.23c-.68.87-.75,2.45-1,3.49-.07.28.38.34.44.06.31-1.29.41-2.75,1.39-3.7.36-.35.74-.69,1.13-1A5.3,5.3,0,0,1,231.52,139.17Z"
                                  fill="#5b434d"></path>
                            <path d="M258.86,90.46s2,.43,1.74,7.7-2.06,21.69-5.36,25.19-18.44,16-18.44,16-4.69-2-4.32-3.77S248.88,118,248.88,118,251.3,85.84,258.86,90.46Z"
                                  fill="#a5dd73"></path>
                            <path d="M231.66,93l-1.12,29.38c0,.64,1,.64,1,0L232.66,93C232.69,92.4,231.69,92.41,231.66,93Z"
                                  fill="#75a542"></path>
                            <path d="M248.95,100.48l-1.54,9.44c-.52,3.2-.64,6.93-2.22,9.83s-4,5.14-6.06,7.53l-6.81,8c-.42.49.29,1.2.71.71l7.13-8.36c2-2.34,4.4-4.64,5.89-7.35s1.68-6.1,2.17-9.12l1.69-10.39C250,100.11,249.05,99.84,248.95,100.48Z"
                                  fill="#75a542"></path>
                            <polygon points="114.36 80.97 114.36 84.95 160.63 58.04 160.63 54.77 114.36 80.97"
                                     fill="#8cc63f"></polygon>
                            <polygon points="138.66 78.64 114.36 92.4 114.36 96.38 138.66 82.24 138.66 78.64"
                                     fill="#f7931e"></polygon>
                            <polygon points="142.07 76.71 142.07 80.26 147.28 77.23 147.28 73.76 142.07 76.71"
                                     fill="#00a99d"></polygon>
                            <polygon points="150.68 71.83 150.68 75.25 160.63 69.47 160.63 66.19 150.68 71.83"
                                     fill="#f15a24"></polygon>
                            <polygon points="135.85 90.09 114.36 102.26 114.36 106.24 135.85 93.74 135.85 90.09"
                                     fill="#f15a24"></polygon>
                            <polygon points="114.96 113.31 114.96 117.29 161.23 90.38 161.23 87.1 114.96 113.31"
                                     fill="#8cc63f"></polygon>
                            <polygon points="129.94 116.26 129.94 120.01 141.12 113.5 141.12 109.92 129.94 116.26"
                                     fill="#00a99d"></polygon>
                            <polygon points="126.53 118.19 114.96 124.74 114.96 128.72 126.53 121.99 126.53 118.19"
                                     fill="#f15a24"></polygon>
                            <polygon points="144.53 107.99 144.53 111.52 161.23 101.8 161.23 98.53 144.53 107.99"
                                     fill="#f7931e"></polygon>
                            <polygon points="153.6 112.71 114.96 134.6 114.96 138.58 153.6 116.1 153.6 112.71"
                                     fill="#f7931e"></polygon>
                            <polygon points="157.01 110.78 157.01 114.12 161.23 111.66 161.23 108.39 157.01 110.78"
                                     fill="#00a99d"></polygon>
                            <polygon points="114.96 146.57 114.96 150.54 161.23 123.63 161.23 120.36 114.96 146.57"
                                     fill="#00a99d"></polygon>
                            <polygon points="132.05 148.32 132.05 152.04 161.23 135.06 161.23 131.79 132.05 148.32"
                                     fill="#f7931e"></polygon>
                            <polygon points="128.64 150.25 114.96 157.99 114.96 161.97 128.64 154.02 128.64 150.25"
                                     fill="#f15a24"></polygon>
                            <polygon points="143.58 151.65 114.96 167.85 114.96 171.83 143.58 155.19 143.58 151.65"
                                     fill="#00a99d"></polygon>
                            <polygon points="146.99 149.72 146.99 153.21 161.23 144.92 161.23 141.65 146.99 149.72"
                                     fill="#8cc63f"></polygon>
                            <g style="isolation:isolate">
                                <polygon points="175.11 243.29 182.48 252.18 181.51 253.12 174.14 244.24 175.11 243.29"
                                         fill="#fff"></polygon>
                                <path d="M156.27,247.9a2.57,2.57,0,0,0,1,1.22,1.71,1.71,0,0,0-.4,1.46Z"
                                      fill="#c46200"></path>
                                <polygon
                                        points="172.58 247.89 174.43 249.16 173.44 252.99 177.86 251.5 179.71 252.76 172.29 255.18 171.02 254.31 172.58 247.89"
                                        fill="#fff"></polygon>
                                <path d="M202.73,248.74a1.71,1.71,0,0,1-.43,1.25,2.32,2.32,0,0,1-.53.45l-18,11.3a3.6,3.6,0,0,1-2.23.46,4.12,4.12,0,0,1-1.59-.48l-22.41-12.43-.28-.17a2.57,2.57,0,0,1-1-1.22,1.8,1.8,0,0,1,.83-2.19l17-11a3.6,3.6,0,0,1,2.25-.48,4.11,4.11,0,0,1,1.49.43l23.41,12.08A2.49,2.49,0,0,1,202.73,248.74Zm-21.23,4.38,1-.94-7.36-8.88-1,.94,7.37,8.88m-9.22,2.06,7.42-2.42-1.85-1.27L173.44,253l1-3.83-1.85-1.27L171,254.31l1.27.87m12-6.9,1.57-6.41-1.28-.87-7.41,2.42,1.85,1.26,4.43-1.5-1,3.84,1.85,1.27"
                                      fill="#f7931e"></path>
                                <polygon
                                        points="184.57 241 177.16 243.41 179 244.67 183.44 243.17 182.43 247.01 184.28 248.28 185.85 241.86 184.57 241"
                                        fill="#fff"></polygon>
                                <path d="M202.31,250a1.71,1.71,0,0,0,.43-1.25l.61,2.57A2.51,2.51,0,0,0,202.31,250Z"
                                      fill="#c46200"></path>
                            </g>
                            <path d="M202.31,250a2.51,2.51,0,0,1,1,1.32,1.86,1.86,0,0,1,.05.21,1.82,1.82,0,0,1-.94,1.88l-18,11.3a3.61,3.61,0,0,1-2.23.47,4.09,4.09,0,0,1-1.59-.49l-22.41-12.43a2.56,2.56,0,0,1-1.36-1.67,1.71,1.71,0,0,1,.4-1.46l.28.17L180,261.72a4.12,4.12,0,0,0,1.59.48,3.6,3.6,0,0,0,2.23-.46l18-11.3A2.32,2.32,0,0,0,202.31,250Z"
                                  fill="#c46200"></path>
                        </svg>
                        <p>Connect with UnusedCSS.io engine to automatically remove unused css from your website and
                            unleash your page speed and speed scores.</p>
                        <span><a class="act-button js-uucss-connect " href="<?php echo UnusedCSS_Utils::activation_url("authorize") ?>" target="_blank">Connect</a></span>
                    </div>
                    <div class="actions slide-content">
                        <img src="<?php echo UUCSS_PLUGIN_URL . 'assets/wp-rocket-hosting.webp'?>" alt="">
                        <h2>Run First Job</h2>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
                        <span><a class="act-button js-uucss-first-job" href="#" target="_blank">Run</a></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="skip-wrap">
            <a href="<?php echo admin_url()?>">Skip</a>
        </div>
    </div>
</div>
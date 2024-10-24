
<?php

/** @var yii\web\View $this */
use yii\helpers\Url;
$this->title = 'My Yii Application';
?>
<div class="content-wrapper">
      <div class="col-12 grid-margin" id="introduction">
                <div class="card">
                  <div class="card-body">
                    <h3 class="mb-4">Introduction</h3>
                    <p>Star Admin 2 Pro is a responsive HTML template that is based on the CSS framework <strong>Bootstrap 5</strong>, and it is built with Sass. Sass compiler makes it easier to code and customize. All Bootstrap components have been modified to fit the style of Star Admin 2 Pro and provide a consistent look throughout the template. Read the documentation of <a href="https://getbootstrap.com/" target="_blank">Bootstrap</a> or <a href="https://sass-lang.com/guide/" target="_blank">Sass</a> if you want to learn more.</p>
                    <p>Before you start working with the template, go through the pages that are bundled with the theme. Most of the template example pages contain quick tips on how to create or use a component, which can be really helpful when you need to create something on the fly.</p>
                    <div class="alert alert-info" role="alert">
                      <p class="d-inline text-danger"><strong>Note</strong>: We are trying our best to document how to use the template. If you think that something is missing from the documentation, please tell us about it. If you have any questions or issues regarding this theme please email us at <a class="d-inline text-info" href="mailto:support@bootstrapdash.com">support@bootstrapdash.com</a>
                      </p>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="col-12 grid-margin" id="getting-started">
                  <div class="card">
                    <div class="card-body">
                      <h3 class="mb-4">Getting started</h3>
                      <p>You can directly use the compiled and ready-to-use the version of the template. But in case you plan to customize the template extensively the template allows you to do so.</p>
                      <p>Within the download you'll find the following directories and files, logically grouping common assets and providing both compiled and minified variations:</p>
                      <hr>
                      <h4 class="my-4" id="f-structure">Folder Structure</h4>
                      <details class="mt-4" open="">
                        <summary>
                          <i class="fa fa-folder-open-o text-body me-1"></i> <strong>Template Name</strong>
                        </summary>
                        <ul class="list-py-1 list-unstyled ps-4">
                          <li>
                            <details open="">
                              <summary>
                                <i class="fa fa-folder-open-o text-body me-1"></i>
                                <strong>dist</strong> - <span class="text-body">contains the distribution files generated from src</span>
                              </summary>
                              <ul class="list-unstyled ps-4">
                                <li>
                                  <details open="">
                                    <summary>
                                      <i class="fa fa-folder-open-o text-body me-1"></i>
                                      <strong>themes</strong>
                                    </summary>
                                    <ul>
                                      <li>
                                        <i class="fa fa-folder-open-o text-body me-1"></i>
                                        <strong>assets</strong> - <span class="text-body">common assets for all templates</span>
                                      </li>
                                      <li>
                                        <i class="fa fa-folder-open-o text-body me-1"></i>
                                        <strong>theme_1</strong>
                                      </li>
                                      <li>
                                        <i class="fa fa-folder-open-o text-body me-1"></i>
                                        <strong>theme_2</strong>
                                      </li>
                                    </ul>
                                  </details>
                                </li>
                              </ul>
                          <li><i class="fa fa-html5 me-1"></i> <span>index.html</span></li>
                      </details>
                      </li>
                      </ul>
                      <ul class="list-py-1 list-unstyled ps-4">
                        <li>
                          <i class="fa fa-folder-open-o text-body me-1"></i>
                          <strong>docs</strong> - <span class="text-body">contains the html,css &amp; js files for the documentation</span>
                        </li>
                        <li>
                          <i class="fa fa-folder-open-o text-body me-1"></i>
                          <strong>node_modules</strong> - <span class="text-body">packages installed using npm</span>
                        </li>
                        <li><i class="fa fa-file-code-o me-1"></i> package.json</li>
                      </ul>
                      <ul class="list-py-1 list-unstyled ps-4">
                        <details open="">
                          <summary>
                            <i class="fa fa-folder-open-o text-body me-1"></i>
                            <strong>src</strong>
                          </summary>
                          <ul class="list-py-1 list-unstyled ps-4">
                            <details open="">
                              <summary>
                                <i class="fa fa-folder-open-o text-body me-1"></i>
                                <strong>assets</strong>
                              </summary>
                              <ul>
                                <li>
                                  <i class="fa fa-folder-open-o text-body me-1"></i>
                                  <strong>css</strong> - <span class="text-body">contains the css files compiled from scss</span>
                                </li>
                                <li>
                                  <i class="fa fa-folder-open-o text-body me-1"></i>
                                  <strong>fonts</strong>
                                </li>
                                <li>
                                  <i class="fa fa-folder-open-o text-body me-1"></i>
                                  <strong>images</strong>
                                </li>
                                <li>
                                  <i class="fa fa-folder-open-o text-body me-1"></i>
                                  <strong>js</strong> - <span class="text-body">js files for core functionality</span>
                                </li>
                                <li>
                                  <i class="fa fa-folder-open-o text-body me-1"></i>
                                  <strong>scss</strong> - <span class="text-body">sass files containing the styles</span>
                                </li>
                                <li>
                                  <i class="fa fa-folder-open-o text-body me-1"></i>
                                  <strong>vendors</strong> - <span class="text-body">all the necessary files copied from node_modules</span>
                                </li>
                              </ul>
                            </details>
                          </ul>
                          <li>
                            <i class="fa fa-folder-open-o text-body me-1"></i>
                            <strong>gulp-task</strong> - <span class="text-body">js files containing specific gulp tasks</span>
                          </li>
                          <li><i class="fa fa-file-code-o me-1"></i> gulpfile.js - <span class="text-body">main gulpfile used to run the tasks</span>
                          </li>
                          <li><i class="fa fa-html5 me-1"></i> index.html</li>
                          <details open="">
                            <summary>
                              <i class="fa fa-folder-open-o text-body me-1"></i>
                              <strong>themes</strong> - <span class="text-body">contains all the templates</span>
                            </summary>
                            <ul class="list-py-1 list-unstyled ps-4">
                              <details open="">
                                <summary>
                                  <i class="fa fa-folder-open-o text-body me-1"></i>
                                  <strong>theme_1</strong>
                                </summary>
                                <ul class="list-py-1 list-unstyled ps-4">
                                  <li>
                                    <i class="fa fa-folder-open-o text-body me-1"></i>
                                    <strong> pages </strong>
                                  </li>
                                  <li>
                                    <i class="fa fa-folder-open-o text-body me-1"></i>
                                    <strong> partials </strong>
                                  </li>
                                  <li><i class="fa fa-html5 me-1"></i> index.html</li>
                                </ul>
                              </details>
                            </ul>
                          </details>
                      </details></ul>
                      </details>
                      
                      <p class="mt-1">Note: The root folder denoted further in this documentation refers to the 'template' folder inside the downloaded folder</p>
                      <div class="alert alert-success mt-4 d-flex align-items-center" role="alert">
                        <i class="ti-info-alt"></i>
                        <p>We have bundled up the vendor files needed for demo purpose into a folder 'vendors', you may not need all those vendors in your application. If you want to make any change in the vendor package files, you need to change the src path for related tasks in the file gulpfile.js and run the task <code>bundleVendors</code> to rebuild the vendor files.</p>
                      </div>
                      <hr class="mt-5">
                      <h4 class="mt-4 mb-4">Installation</h4>
                      <p class="mt-2">
                        <strong>Step 1: </strong>To begin, please download and install <a href="https://nodejs.org/en/download" target="_blank">Node.js</a>. If you have already installed it, please proceed to step 2.
                      </p>
                      <p class="mt-2">
                        <strong>Step 2: </strong>Install gulp-cli globally by running <code>npm install -g gulp-cli</code> command. If it's already installed, skip to step 3
                      </p>
                      <p class="mt-2">
                        <strong>Step 3: </strong>To get started, go to the root directory of the project and run the command <code>npm install</code>. This will install the necessary dependencies for the project to run smoothly.
                      </p>
                      <p class="mt-2">
                        <strong>Step 4: </strong>After installing the required dependencies, run <code>cd src</code> to navigate to the src folder and execute the <code>gulp serve</code> command.
                      </p>
                      <div class="alert alert-warning mt-4 text-warning" role="alert">
                        <i class="ti-info-alt"></i> It is important to run <code>gulp serve</code> command from the directory where the gulpfile.js is located.
                      </div>
                    </div>
                  </div>
                </div>
                
              
      </div>
</div>
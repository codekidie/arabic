

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>My Results</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <p>Simple table with project listing with progress and editing options</p>

                    <!-- start project list -->
                    <table class="table table-striped projects">
                      <thead>
                        <tr>
                          <th style="width: 1%">Quiz ID #</th>
                          <th style="width: 20%">Quiz Name</th>
                          <th>Instructor</th>
                          <th>Quiz Average</th>
                          <th>Status</th>
                          <th style="width: 20%">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php if ($answers): ?>
                          <?php foreach ($answers as $a): ?>
                                <tr>
                                  <td>#</td>
                                  <td>
                                    <a><?php echo $a['answer_text'] ?></a>
                                    <br />
                                    <small>Created <?php echo Date::time_ago($a['created_at']); ?></small>
                                  </td>
                                  <td>
                                    <ul class="list-inline">
                                      <li>
                                       <?php echo Asset::img('user.png', array('class' => 'avatar')); ?>
                                      </li>
                                    </ul>
                                  </td>
                                  <td class="project_progress">
                                  <div class="progress progress_sm">
                                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="57" aria-valuenow="56" style="width: 57%;"></div>
                                    </div>
                                    <small>87% Complete</small>
                                  </td>
                                  <td>
                                    <button type="button" class="btn btn-success btn-xs">Pass</button>
                                  </td>
                                  <td>
                                    <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                    <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                  </td>
                                </tr>
                          <?php endforeach ?>
                      <?php endif ?>
                      </tbody>
                    </table>
                    <!-- end project list -->
                  </div>
                </div>
              </div>
            </div>

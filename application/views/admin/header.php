<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Buras | Admin</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?=base_url('assets/admin/vendor/bootstrap/css/bootstrap.css')?>" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="<?=base_url('assets/admin/vendor/metisMenu/metisMenu.min.css')?>" rel="stylesheet">

  <!-- Social Buttons CSS -->
  <link href="<?=base_url('assets/admin/vendor/bootstrap-social/bootstrap-social.css')?>" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?=base_url('assets/admin/dist/css/sb-admin-2.css')?>" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <link href="<?=base_url('assets/admin/vendor/morrisjs/morris.css')?>" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="<?=base_url('assets/admin/vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">

  <!-- DataTables CSS -->
  <link href="<?=base_url('assets/admin/vendor/datatables-plugins/dataTables.bootstrap.css')?>" rel="stylesheet">

  <!-- DataTables Responsive CSS -->
  <link href="<?=base_url('assets/admin/vendor/datatables-responsive/dataTables.responsive.css')?>" rel="stylesheet">

  <!-- jQuery -->
  <script src="<?=base_url('assets/admin/vendor/jquery/jquery.min.js')?>"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="<?=base_url('assets/admin/vendor/bootstrap/js/bootstrap.min.js')?>"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="<?=base_url('assets/admin/vendor/metisMenu/metisMenu.min.js')?>"></script>

  <!-- Custom Theme JavaScript -->
  <script src="<?=base_url('assets/admin/dist/js/sb-admin-2.js')?>"></script>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style media="screen">
    #level-table * {
      text-align: center;
    }
  </style>

</head>

<body>
<div id="wrapper">
  <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=base_url('admin/Main')?>">Buras Admin v1.0</a>
    </div>
    <!-- /.navbar-header -->
    <!-- 상단바 메뉴 시작 -->
    <ul class="nav navbar-top-links navbar-right">
      <!-- /.dropdown -->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="##">
          <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-alerts">
          <li>
            <a href="##">
              <div>
                <i class="fa fa-comment fa-fw"></i> New Comment
                <span class="pull-right text-muted small">4 minutes ago</span>
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="##">
              <div>
                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                <span class="pull-right text-muted small">12 minutes ago</span>
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="##">
              <div>
                <i class="fa fa-envelope fa-fw"></i> Message Sent
                <span class="pull-right text-muted small">4 minutes ago</span>
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="##">
              <div>
                <i class="fa fa-tasks fa-fw"></i> New Task
                <span class="pull-right text-muted small">4 minutes ago</span>
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a href="##">
              <div>
                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                <span class="pull-right text-muted small">4 minutes ago</span>
              </div>
            </a>
          </li>
          <li class="divider"></li>
          <li>
            <a class="text-center" href="##">
              <strong>See All Alerts</strong>
              <i class="fa fa-angle-right"></i>
            </a>
          </li>
        </ul>
        <!-- /.dropdown-alerts -->
      </li>
      <!-- /.dropdown -->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="##">
          <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
          <li><a href="##"><i class="fa fa-user fa-fw"></i> User Profile</a>
          </li>
          <li><a href="##"><i class="fa fa-gear fa-fw"></i> Settings</a>
          </li>
          <li class="divider"></li>
          <li><a href="<?=base_url('Login/logout')?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
          </li>
        </ul>
        <!-- /.dropdown-user -->
      </li>
      <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
    <!-- 상단바 메뉴 끝 -->

    <!-- 사이드바 메뉴 시작 -->
    <div class="navbar-default sidebar" role="navigation">
      <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
          <!-- 권한 테이블 -->
          <li class="sidebar-search">
            <table id="level-table" class="table" style="margin-bottom: 0em;">
              <thead>
                <tr>
                  <th>레벨</th>
                  <th>권한명</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>10</td>
                  <td>웹마스터</td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>회계관리자</td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>렌탈관리자</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>정회원</td>
                </tr>
                <tr>
                  <td>0</td>
                  <td>비회원</td>
                </tr>
              </tbody>
            </table>
            <!-- /input-group -->
          </li>

          <!-- 사이드바 메뉴 리스트 시작 -->
          <li>
            <a href="<?=base_url('admin/Main')?>"><i class="fa fa-home fa-fw"></i> 홈</a>
          </li>
          <li>
            <a href="<?=base_url('admin/Member')?>"><i class="fa fa-users fa-fw"></i> 회원 관리</a>
          </li>
          <li>
            <a href="##"><i class="fa fa-list-alt fa-fw"></i> 게시판 관리<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="##">카테고리 관리</a>
              </li>
              <li>
                <a href="##">게시물 관리</a>
              </li>
              <li>
                <a href="##">댓글 관리</a>
              </li>
              <li>
                <a href="##">공지사항</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="##"><i class="fa fa-archive fa-fw"></i> 물품 관리<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="##">카테고리 관리</a>
              </li>
              <li>
                <a href="##">물품 리스트</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="##"><i class="fa fa-expand fa-fw"></i> 렌탈 관리</a>
          </li>
          <li>
            <a href="##"><i class="fa fa-krw fa-fw"></i> 회계 관리</a>
          </li>
        </ul>
      </div>
      <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
  </nav>
  <div id="page-wrapper">
    <div class="container-fluid">

<li class="nav-item">
    <a href="{{ route('rpa.issue_mr.dashboard')}}" class="nav-link <?php if($page=='RequestIssue'){echo 'active';}?>">
        <i class="nav-icon fas fa-edit"></i>
        <p>Request Issue MR</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('rpa.issue_mr.report',234)}}" class="nav-link <?php if($page=='ReportIssueMR'){echo 'active';}?>">
        <i class="nav-icon fas fa-book"></i>
        <p>Report</p>
    </a>
</li>


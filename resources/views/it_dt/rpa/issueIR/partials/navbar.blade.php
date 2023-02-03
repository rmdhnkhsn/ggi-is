<li class="nav-item">
    <a href="{{ route('rpa.issueIR.index',234)}}" class="nav-link <?php if($page=='IssueIR'){echo 'active';}?>">
        <i class="nav-icon fas fa-edit"></i>
        <p>Request Issue IR</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('rpa.issueIR.report',234)}}" class="nav-link <?php if($page=='ReportIssueIR'){echo 'active';}?>">
        <i class="nav-icon fas fa-book"></i>
        <p>Report</p>
    </a>
</li>


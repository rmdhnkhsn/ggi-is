<input type="hidden" class="form-control" id="nik" name="nik" value="{{ Auth::user()->nik }}">
<div class="form-group">
    <label for="roll">Current Password</label><br>
    <input type="password" class="col-lg-3" id="current" name="current_password"  placeholder="Insert Current Password" autocomplete="current-password" required>
    <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span>
</div>
<div class="form-group">
    <label for="roll">New Password</label><br>
    <input type="password" class="col-lg-3" id="new" name="new_password" placeholder="Insert New Password" autocomplete="current-password" required>
    <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password2"></span>
</div>
<div class="form-group">
    <label for="roll">Confirm New Password</label><br>
    <input type="password" class="col-lg-3" id="confrim" name="new_confirm_password" placeholder="Confirm New Password" autocomplete="current-password" required>
    <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password3"></span>
</div>
<button type="submit" class="btn btn-primary btn-block col-lg-3"><i class="fas fa-save"></i> {{$submit}}</button>

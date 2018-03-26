<p title="Weeks {{ date('W', strtotime($account->date_start)) }} thru {{ date('W', strtotime($account->date_end)) }}">
    {{ date('l, M j, Y', strtotime($account->date_start)) }} - {{ date('l, M j, Y', strtotime($account->date_end)) }}
</p>



          <li class="c-sidebar-nav-item ml-2 mr-2">
                <div class="p-1">
                    Energy {{$energyBar['userEnergy']}} / {{$energyBar['userMaxEnergy']}}
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{$energyBar['userEnergyfill']}}%;"></div>
                    </div>
                </div>
                <div class="p-1">
                    Nerve {{$nerveBar['userNerve']}} / {{$nerveBar['userMaxNerve']}}
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{$nerveBar['userNervefil']}}%;"></div>
                    </div>
                </div>
                <div class="p-1">
                    HP {{$hpBar['userHp']}} / {{$hpBar['userMaxHp']}}
                    <div class="progress progress-sm">
                        <div class="progress-bar bg-info" role="progressbar" style="width: {{$hpBar['userHpfil']}}%;"></div>
                    </div>
                </div>
            </li>
            <li class="c-sidebar-nav-title m-0">Information</li>
            <li class="c-sidebar-nav-item">
                 <!-- https://www.php.net/manual/en/numberformatter.formatcurrency.php -->
                   Money :  {{ $money }} <br>
                   Point :  {{ $points }}
            </li>

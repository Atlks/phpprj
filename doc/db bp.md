


# str fmt

fl n zip md is btr...uniq idx auto l ...


json need add uniq idx..


# idx ..tp cache

abt >50w dt ned 
$rows = Cache::remember(' ', function () use ($CollStorepath) {

        $rows203 = qry($CollStorepath, function ($jsonobj) {

            if ($jsonobj['game_id'] == 666)
                return true;

        });
        return json_encode($rows203);
    });
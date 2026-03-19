//TABELA ZMAG
SELECT name,
SUM(case when result_id=1 then 1 else 0 end) as Z,
SUM(case when result_id=2 then 1 else 0 end) as P,
SUM(case when result_id=3 then 1 else 0 end) as N,
SUM(case when result_id=1 then 1 else 0 end)+SUM(case when result_id=3 then 1 else 0 end)+SUM(case when result_id=2 then 1 else 0 end) as tekme,
SUM(case when result_id=1 then 1 else 0 end)+SUM(case when result_id=3 then 0.5 else 0 end) as tocke,
(SUM(case when result_id=1 then 1 else 0 end)+SUM(case when result_id=3 then 0.5 else 0 end))/(SUM(case when result_id=1 then 1 else 0 end)+SUM(case when result_id=3 then 1 else 0 end)+SUM(case when result_id=2 then 1 else 0 end)) as procenti

FROM matches

LEFT JOIN player ON player.id = matches.player_id
LEFT JOIN round ON round.id = matches.round_id

WHERE result_id != 4 AND round.season_id=1

GROUP by name
ORDER BY tocke DESC


//PRIMERJAVA 2 IGRALCEV

SELECT round_id,
       count(*) AS c
FROM matches
WHERE player_id in (1,4) and result_id = 3
GROUP BY round_id
HAVING c > 1
ORDER BY `matches`.`round_id` ASC

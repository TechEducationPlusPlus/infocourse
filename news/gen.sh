#!/bin/bash
echo "Logo: ";
read -r logo;
echo "Title: ";
read -r title;
echo "Time: ";
read -r time;
echo "Place: ";
read -r place;
echo "Short info: ";
read -r short_info;
echo "Full info: ";
cat > /tmp/full_info;

echo -n "<article> " >> /tmp/gen;
echo -n "    <header> " >> /tmp/gen;
echo -n "		<div class='logo'> <img class='img-responsive' src='$logo' /> </div> $title " >> /tmp/gen;
echo -n "        <summary> " >> /tmp/gen;
echo -n "            <p><i class='fa fa-clock-o' aria-hidden='true'></i> <time>$time</time> </p> " >> /tmp/gen;
echo -n "            <p><i class='fa fa-map-marker' aria-hidden='true'></i> $place </p> " >> /tmp/gen;
echo -n "			$short_info " >> /tmp/gen;
echo -n "        </summary> " >> /tmp/gen;
echo -n "    </header> " >> /tmp/gen;
echo -n "    <aside> " >> /tmp/gen;
echo -n "        <p>" >> /tmp/gen;
echo -n "			`cat /tmp/full_info` " >> /tmp/gen;
echo -n "        </p>" >> /tmp/gen;
echo -n "    </aside> " >> /tmp/gen;
echo    "</article> " >> /tmp/gen;
cat /tmp/gen | sed ':a;N;$!ba;s/\n/<br>/g' > /tmp/gen_minifyed;
cat /tmp/gen_minifyed;
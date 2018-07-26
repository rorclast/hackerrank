while read line;
do
    echo $line | grep -iw 'the\|that\|then\|those'
done
while read line;
do
  echo $line | grep -iwv 'that'
done
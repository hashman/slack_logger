#!/bin/bash

FILE=$1

FNUM=`wc -l $FILE | awk '{print $1}'`;

while true
do
    LNUM=`wc -l $FILE | awk '{print $1}'`;

    if [[ "$FNUM" != "$LNUM" ]]
    then
        DIFF="$((LNUM - FNUM))"
        MSG=`tail -$DIFF $FILE`
        echo "Get Log!!\n";
        php go.php "$MSG"
        FNUM=$LNUM
    fi
    sleep 5
done

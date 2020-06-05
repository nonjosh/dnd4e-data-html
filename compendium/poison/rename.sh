#!/bin/bash
for f in `find . -type f | grep \.html`
   do
   title=$( awk 'BEGIN{IGNORECASE=1;FS="<title>|</title>";RS=EOF} {print $2}' "$f" )
   title=$( echo "$title" | tr '\/\\' '_' )
   mv -f -i "$f" "${title//[ ]/-}".html
done

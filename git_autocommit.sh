while true; do
  date
  OUT=""
  if [ $(git ls-files -m | wc -l) -gt 0 ]; then
     OUT="${OUT}$(git ls-files -m | sed 's/^/~/')\n"
  fi
  if [ $(git ls-files -o | wc -l) -gt 0 ]; then
     OUT="${OUT}$(git ls-files -o | sed 's/^/+/')\n"
  fi
  if [ $(git ls-files -mo | wc -l) -gt 0 ] && zenity --question --text="${OUT}\n----------\nSubmit?" --timeout=60 ; then
    git gui
    if [ $(git ls-files -mo | wc -l) -eq 0 ] && zenity --question --text="PUSH/PULL?" --timeout=120; then
      echo -e "\n== PULL =="
      git pull
      echo -e "\n== PUSH =="
      git push
    fi
  fi
  sleep 60
done

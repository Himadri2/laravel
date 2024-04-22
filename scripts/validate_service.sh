#!/bin/bash

WEBSITE_URL="http://app.quixz.cloud/"
EXPECTED_RESPONSE_CODE=200

# Fetch the website and store the HTTP response code
HTTP_RESPONSE_CODE=$(curl -s -o /dev/null -w "%{http_code}" $WEBSITE_URL)

# Check if the HTTP response code matches the expected response code
if [ "$HTTP_RESPONSE_CODE" -eq "$EXPECTED_RESPONSE_CODE" ]; then
    echo "Website $WEBSITE_URL is working fine. HTTP Response Code: $HTTP_RESPONSE_CODE"
    exit 0
else
    echo "Website $WEBSITE_URL is not working as expected. HTTP Response Code: $HTTP_RESPONSE_CODE"
    exit 1
fi


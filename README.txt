Using PhP and MySQL, implement a Web-based application for an online video-store. The online
video-store maintains an inventory of DVDs. Customers become member of this online store. They
are able to search for DVDs of their interest and add DVDs to their shopping cart. At any time,
they are able to edit the shopping cart and also are able to check out. The initial login screen shown
in the Figure 8.1 allows an existing customer to sign in or a new customer to register. The new
customer registration screen is shown in Figure 8.2. Upon successful sign-in, the 3-frame page
shown in Figure 8.3 is displayed. As one can see, there are six different options for the customer:

1. Search by Keyword: This option allows the customer to perform a keyword search of the
DVD titles (substring; case insensitive comparison). Successful matches are shown on the
right frame (Figure 8.4). The customer may then choose certain quantities of the DVDs and
add them to the shopping cart. Upon successful addition to the shopping cart, a message
should be shown on the right frame.

2. View/Edit Cart: Upon clicking this option, the system should display the shopping cart on
the right side frame (Figure 8.5). Here, the customer may edit the shopping cart by
changing quantities including replacing a value with a zero. Upon submission, the cart
should be updated and a message should be displayed.

3. Update Profile: This option brings up the customers profile (Figure 8.6) on the right
frame. The user may modify any field and submit. Upon successful update, a message
should be displayed.

4. Check Order Status: This option allows the customer to see all their orders (Figure 8.7).
Upon clicking the order number link the details for that order should be displayed in a
tabular format. 

5. Check Out: Upon clicking this link, the system should empty the cart and move the items
into the orders and odetails tables. An invoice (Figure 8.8) should be printed on the
right frame.

6. Logout: Upon logout, the system should display 3 Options (Figure 8.9) to the user. The
user may check out, save cart and logout or empty cart and logout. Upon checkout a similar
action should take place as earlier. Upon the other two options, appropriate action should
take place and a message should be displayed. If the cart was empty to begin with these 3
options should not be shown and the customer should be logged out. 
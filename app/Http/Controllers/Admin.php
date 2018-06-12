<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Admin extends Controller
{

    /**
     * Admin dashboard - overall reviews of the system
    */
    public function dashboard(Request $request){
        $slug = 'home';
        return view('admin.pages.dashboard', [
            'slug' => $slug
        ]);
    }

    /**
     * Create Admin function - create admin users for the system
     */
    public function createAdmin(Request $request){
        $slug = 'addmin';
        return view('admin.pages.create-admins', [
            'slug' => $slug,
            'modals' => 'admin.pages.modals.create-admin-modals'
        ]);
    }

    /**
     * Admin List - shows all the admins
     */
    public function adminList(Request $request){
        $slug = 'list';
        return view('admin.pages.admin-list', [
            'slug' => $slug,
            'modals' => 'admin.pages.modals.admin-list-modals'
        ]);
    }

    /**
     * Driver List - shows all the drivers registered on the system
     */
    public function driverList(Request $request){
        $slug = 'drivers';
        return view('admin.pages.driver-list', [
            'slug' => $slug
        ]);
    }

    /**
     * Customer List - shows all the customers connected with the system
     */
    public function customerList(Request $request){
        $slug = 'customers';
        return view('admin.pages.customer-list', [
            'slug' => $slug
        ]);
    }

    /**
     * Ride Details - shows all the rides info by the system
     */
    public function rideDetails(Request $request){
        $slug = 'rides';
        return view('admin.pages.ride-details', [
            'slug' => $slug
        ]);
    }

    /**
     * View Customer - shows the detailed info of a customer on the system
     */
    public function viewCustomer(Request $request){
        $slug = '';
        return view('admin.pages.view-customer', [
            'slug' => $slug,
            'modals' => 'admin.pages.modals.view-customer-modals'
        ]);
    }

    /**
     * View Driver - shows the detailed info of a driver on the system
     */
    public function viewDriver(Request $request){
        $slug = '';
        return view('admin.pages.view-driver', [
            'slug' => $slug,
            'modals' => 'admin.pages.modals.view-driver-modals'
        ]);
    }

    /**
     * Login - login function for admin area
    */
    public function login(Request $request){
        return view('admin.pages.login');
    }

}

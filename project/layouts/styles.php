<style>
    .profile-image {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #ddd;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        cursor: pointer;
    }

    .profile-image:hover {
        transform: scale(1.05);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    /* Modal styles */
    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        padding-top: 60px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.9);
    }

    .modal-content {
        display: block;
        margin: auto;
        max-width: 90%;
        max-height: 80%;
        border-radius: 10px;
    }

    .close {
        position: absolute;
        top: 30px;
        right: 50px;
        color: white;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
    }
</style>